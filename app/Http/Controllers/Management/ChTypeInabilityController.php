<?php

namespace App\Http\Controllers\Management;

use App\Models\ChTypeInability;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChTypeInabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChTypeInability = ChTypeInability::select(); /// Cargar 

        if ($request->_sort) {
            $ChTypeInability->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChTypeInability->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChTypeInability = $ChTypeInability->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChTypeInability = $ChTypeInability->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Tipo de Incapacidad  obtenidos exitosamente',
            'data' => ['ch_type_inability' => $ChTypeInability]
        ]);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $id,int $type_record_id): JsonResponse
    {
        
       
        $ChTypeInability = ChTypeInability::with('type_record', 'ch_record')
        ->where('ch_record_id', $id)
        ->where('ch_type_inability.type_record_id', 1)
        ->where('type_record_id',$type_record_id);
        
        if ($request->query("pagination", true) == "false") {
            $ChTypeInability = $ChTypeInability->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChTypeInability = $ChTypeInability->paginate($per_page, '*', 'page', $page);
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Tipo de Incapacidad Asociada  al paciente exitosamente',
            'data' => ['ch_type_inability' => $ChTypeInability]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChTypeInability = new ChTypeInability;
        $ChTypeInability->name = $request->name;
        
        $ChTypeInability->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de Incapacidad Asociada  al paciente exitosamente',
            'data' => ['ch_type_inability' => $ChTypeInability->toArray()]
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
        $ChTypeInability = ChTypeInability::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de Incapacidad obtenido exitosamente',
            'data' => ['ch_type_inability' => $ChTypeInability]
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
        $ChTypeInability = ChTypeInability::find($id);
        $ChTypeInability->name = $request->name;
        
        $ChTypeInability->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de Incapacidad actualizado exitosamente',
            'data' => ['ch_type_inability' => $ChTypeInability]
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
            $ChTypeInability = ChTypeInability::find($id);
            $ChTypeInability->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de Incapacidad  eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de Incapacidad  en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
