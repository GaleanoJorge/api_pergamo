<?php

namespace App\Http\Controllers\Management;

use App\Models\ChContingencyCode;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChContingencyCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChContingencyCode = ChContingencyCode::with('enterally_diet','diet_consistency'); /// Cargar 

        if ($request->_sort) {
            $ChContingencyCode->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChContingencyCode->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChContingencyCode = $ChContingencyCode->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChContingencyCode = $ChContingencyCode->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Codigo de Contingencia  obtenidos exitosamente',
            'data' => ['ch_contingency_code' => $ChContingencyCode]
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
        
       
        $ChContingencyCode = ChContingencyCode::with('enterally_diet', 'diet_consistency', 'type_record', 'ch_record')
        ->where('ch_record_id', $id)->where('type_record_id',$type_record_id);
        
        if ($request->query("pagination", true) == "false") {
            $ChContingencyCode = $ChContingencyCode->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChContingencyCode = $ChContingencyCode->paginate($per_page, '*', 'page', $page);
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Codigo de Contingencia Asociada  al paciente exitosamente',
            'data' => ['ch_contingency_code' => $ChContingencyCode]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChContingencyCode = new ChContingencyCode;
        $ChContingencyCode->name = $request->name;
        
        $ChContingencyCode->save();

        return response()->json([
            'status' => true,
            'message' => 'Codigo de Contingencia Asociada  al paciente exitosamente',
            'data' => ['ch_contingency_code' => $ChContingencyCode->toArray()]
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
        $ChContingencyCode = ChContingencyCode::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Codigo de Contingencia obtenido exitosamente',
            'data' => ['ch_contingency_code' => $ChContingencyCode]
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
        $ChContingencyCode = ChContingencyCode::find($id);
        $ChContingencyCode->name = $request->name;
        
        $ChContingencyCode->save();

        return response()->json([
            'status' => true,
            'message' => 'Codigo de Contingencia actualizado exitosamente',
            'data' => ['ch_contingency_code' => $ChContingencyCode]
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
            $ChContingencyCode = ChContingencyCode::find($id);
            $ChContingencyCode->delete();

            return response()->json([
                'status' => true,
                'message' => 'Codigo de Contingencia  eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Codigo de Contingencia  en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
