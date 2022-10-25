<?php

namespace App\Http\Controllers\Management;

use App\Models\Bed;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Bed = Bed::with('pavilion', 'pavilion.flat', 'pavilion.flat.campus', 'status_bed', 'procedure');

        if ($request->_sort) {
            $Bed->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Bed->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('code', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $Bed = $Bed->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Bed = $Bed->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Cama asociados al paciente exitosamente',
            'data' => ['bed' => $Bed]
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @param integer $pavilion_id
     * @return JsonResponse
     */
    public function getBedByPavilion(int $pavilion_id, int $ambit, int $procedure): JsonResponse
    {
        $Bed = Bed::where('pavilion_id', $pavilion_id)
            ->where('status_bed_id', '=', '1')
            ->where('bed_or_office', '=', $ambit);
        if ($procedure != 0) {
            $Bed->where('procedure_id', '=', $procedure);
        }
        $Bed->orderBy('name', 'asc');
        $Bed = $Bed->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Camas obtenidos exitosamente',
            'data' => ['bed' => $Bed]
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @param integer $pavilion_id
     * @return JsonResponse
     */
    public function getBedsByCampus(int $campus_id): JsonResponse
    {
        $AvailableBeds = Bed::select('bed.*')
            ->leftJoin('pavilion','pavilion.id','bed.pavilion_id')
            ->leftJoin('flat','flat.id','pavilion.flat_id')
            ->leftJoin('campus','campus.id','flat.campus_id')
            ->where('campus.id', $campus_id)
            ->where('bed.status_bed_id', '=', 1)
            ->where('bed.bed_or_office', '=', 1);
        $AvailableBeds->orderBy('bed.name', 'asc');
        $AvailableBeds = $AvailableBeds->get()->toArray();

        $BusyBeds = Bed::select('bed.*')
            ->leftJoin('pavilion','pavilion.id','bed.pavilion_id')
            ->leftJoin('flat','flat.id','pavilion.flat_id')
            ->leftJoin('campus','campus.id','flat.campus_id')
            ->where('campus.id', $campus_id)
            ->where('bed.status_bed_id', '=', 2)
            ->where('bed.bed_or_office', '=', 1);
        $BusyBeds->orderBy('bed.name', 'asc');
        $BusyBeds = $BusyBeds->get()->toArray();

        $FixBeds = Bed::select('bed.*')
            ->leftJoin('pavilion','pavilion.id','bed.pavilion_id')
            ->leftJoin('flat','flat.id','pavilion.flat_id')
            ->leftJoin('campus','campus.id','flat.campus_id')
            ->where('campus.id', $campus_id)
            ->where('bed.status_bed_id', '=', 3)
            ->where('bed.bed_or_office', '=', 1);
        $FixBeds->orderBy('bed.name', 'asc');
        $FixBeds = $FixBeds->get()->toArray();

        $CleanBeds = Bed::select('bed.*')
            ->leftJoin('pavilion','pavilion.id','bed.pavilion_id')
            ->leftJoin('flat','flat.id','pavilion.flat_id')
            ->leftJoin('campus','campus.id','flat.campus_id')
            ->where('campus.id', $campus_id)
            ->where('bed.status_bed_id', '=', 4)
            ->where('bed.bed_or_office', '=', 1);
        $CleanBeds->orderBy('bed.name', 'asc');
        $CleanBeds = $CleanBeds->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Camas obtenidos exitosamente',
            'data' => [
                'available_bed' => $AvailableBeds,
                'busy_bed' => $BusyBeds,
                'fix_bed' => $FixBeds,
                'clean_bed' => $CleanBeds,
            ]
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @param integer $pavilion_id
     * @return JsonResponse
     */
    public function getBedByPacient(Request $request): JsonResponse
    {
        $Bed = Bed::with('status_bed', 'location', 'location.admissions', 'location.admissions.patients')->where('bed_or_office', 1);

        if ($request->_sort) {
            $Bed->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Bed->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $Bed = $Bed->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Bed = $Bed->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Camas obtenidos exitosamente',
            'data' => ['bed' => $Bed]
        ]);
    }



    public function store(BedRequest $request): JsonResponse
    {
        $Bed = new Bed;
        $Bed->code = $request->code;
        $Bed->name = $request->name;
        $Bed->status_bed_id = $request->status_bed_id;
        $Bed->bed_or_office = $request->bed_or_office;
        $Bed->pavilion_id = $request->pavilion_id;
        $Bed->procedure_id = $request->procedure_id;


        $Bed->save();

        return response()->json([
            'status' => true,
            'message' => 'Cama creada exitosamente',
            'data' => ['bed' => $Bed->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $Bed = Bed::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cama obtenido exitosamente',
            'data' => ['bed' => $Bed]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        if ($request == true) {
            $Bed = Bed::find($id);
            $Bed->status_bed_id = $request->status_bed_id;
            $Bed->save();
        } else {
            $Bed = Bed::find($id);
            $Bed->code = $request->code;
            $Bed->name = $request->name;
            $Bed->status_bed_id = $request->status_bed_id;
            $Bed->pavilion_id = $request->pavilion_id;
            $Bed->bed_or_office = $request->bed_or_office;
            $Bed->procedure_id = $request->procedure_id;



            $Bed->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Cama actualizado exitosamente',
            'data' => ['bed' => $Bed]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $Bed = Bed::find($id);
            $Bed->delete();

            return response()->json([
                'status' => true,
                'message' => 'Camae eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Cama esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
