<?php

namespace App\Http\Controllers\Management;

use App\Models\Pavilion;
use App\Models\Bed;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PavilionRequest;
use Illuminate\Database\QueryException;

class PavilionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Pavilion = Pavilion::with('flat', 'flat.campus');

        if ($request->_sort) {
            $Pavilion->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Pavilion->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $Pavilion = $Pavilion->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Pavilion = $Pavilion->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'pabellón de atencion para el paciente asociados exitosamente',
            'data' => ['pavilion' => $Pavilion]
        ]);
    }


    /**
     * Display a listing of the resource
     *
     * @param integer $flat_id
     * @return JsonResponse
     */
    public function getPavilionByFlat(Request $request, int $flat_id): JsonResponse
    {
        $Pavilion = Pavilion::select('pavilion.*')
            ->leftJoin('bed', 'bed.pavilion_id', 'pavilion.id')
            ->where('pavilion.flat_id', $flat_id)
            ->orderBy('name', 'asc')
            ->groupBy('pavilion.id');
            if ($request->bed_or_office) {
                $Pavilion->where('bed.bed_or_office', $request->bed_or_office);
            }
            $Pavilion=$Pavilion->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Programas obtenidos exitosamente',
            'data' => ['pavilion' => $Pavilion]
        ]);
    }

    public function getPavilionByBed(int $bed_id): JsonResponse
    {

        $Pavilion = Bed::find($bed_id)->pavilion;
        return response()->json([
            'status' => true,
            'message' => 'Pabellón obtenido con éxito',
            'data' => ['pavilion' => $Pavilion]
        ]);
    }


    public function store(PavilionRequest $request): JsonResponse
    {
        $Pavilion = new Pavilion;
        $Pavilion->code = $request->code;
        $Pavilion->name = $request->name;
        $Pavilion->flat_id = $request->flat_id;

        $Pavilion->save();

        return response()->json([
            'status' => true,
            'message' => 'pabellón de atencion para el paciente creada exitosamente',
            'data' => ['pavilion' => $Pavilion->toArray()]
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
        $Pavilion = Pavilion::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'pabellón de atencion para el paciente obtenido exitosamente',
            'data' => ['pavilion' => $Pavilion]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(PavilionRequest $request, int $id): JsonResponse
    {
        $Pavilion = Pavilion::find($id);
        $Pavilion->code = $request->code;
        $Pavilion->name = $request->name;
        $Pavilion->flat_id = $request->flat_id;


        $Pavilion->save();

        return response()->json([
            'status' => true,
            'message' => 'pabellón de atencion para el paciente actualizado exitosamente',
            'data' => ['pavilion' => $Pavilion]
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
            $Pavilion = Pavilion::find($id);
            $Pavilion->delete();

            return response()->json([
                'status' => true,
                'message' => 'pabellón de atencion para el paciente eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'pabellón de atencion para el paciente esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
