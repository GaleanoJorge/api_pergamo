<?php

namespace App\Http\Controllers\Management;

use App\Models\ChTypeProcedure;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChTypeProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChTypeProcedure = ChTypeProcedure::select(); /// Cargar 

        if ($request->_sort) {
            $ChTypeProcedure->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChTypeProcedure->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChTypeProcedure = $ChTypeProcedure->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChTypeProcedure = $ChTypeProcedure->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Tipo de Procedimiento  obtenidos exitosamente',
            'data' => ['ch_type_procedure' => $ChTypeProcedure]
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
        
       
        $ChTypeProcedure = ChTypeProcedure::with('type_record', 'ch_record')
        ->where('ch_record_id', $id)->where('type_record_id',$type_record_id);
        
        if ($request->query("pagination", true) == "false") {
            $ChTypeProcedure = $ChTypeProcedure->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChTypeProcedure = $ChTypeProcedure->paginate($per_page, '*', 'page', $page);
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Tipo de Procedimiento Asociada  al paciente exitosamente',
            'data' => ['ch_type_procedure' => $ChTypeProcedure]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChTypeProcedure = new ChTypeProcedure;
        $ChTypeProcedure->name = $request->name;
        
        $ChTypeProcedure->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de Procedimiento Asociada  al paciente exitosamente',
            'data' => ['ch_type_procedure' => $ChTypeProcedure->toArray()]
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
        $ChTypeProcedure = ChTypeProcedure::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de Procedimiento obtenido exitosamente',
            'data' => ['ch_type_procedure' => $ChTypeProcedure]
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
        $ChTypeProcedure = ChTypeProcedure::find($id);
        $ChTypeProcedure->name = $request->name;
        
        $ChTypeProcedure->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de Procedimiento actualizado exitosamente',
            'data' => ['ch_type_procedure' => $ChTypeProcedure]
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
            $ChTypeProcedure = ChTypeProcedure::find($id);
            $ChTypeProcedure->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de Procedimiento  eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de Procedimiento  en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
