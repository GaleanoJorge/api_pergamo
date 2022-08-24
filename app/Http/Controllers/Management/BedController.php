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
        $Bed = Bed::with('pavilion', 'pavilion.flat', 'pavilion.flat.campus', 'status_bed');

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
    public function getBedByPavilion(int $pavilion_id, int $ambit): JsonResponse
    {
        $Bed = Bed::where('pavilion_id', $pavilion_id)->where('status_bed_id', '=', '1')->where('bed_or_office', '=', $ambit)
            ->orderBy('name', 'asc')->get()->toArray();

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
    public function getBedByPacient(Request $request): JsonResponse
    {
        $Bed = Bed::with('status_bed', 'location', 'location.admissions', 'location.admissions.users')->where('bed_or_office', 1);

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

    /**
     * Display a listing of the resource
     *
     * @param integer $pavilion_id
     * @return JsonResponse
     */
    public function getOfficeByCampus(Request $request): JsonResponse
    {
        $Bed = Bed::select('bed.*')
            ->leftJoin('pavilion', 'bed.pavilion_id', 'pavilion.id')
            ->leftjoin('flat', 'pavilion.flat_id', 'flat.id')
            ->with(
                'status_bed',
                'pavilion',
                'pavilion.flat',
                'pavilion.flat.campus',
            )
            ->where([
                'bed.status_bed_id' => $request->status_bed_id,
                'bed.bed_or_office' => '2',
                'flat.campus_id' => $request->campus_id,
            ]);

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
