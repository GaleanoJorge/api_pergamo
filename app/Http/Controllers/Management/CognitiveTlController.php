<?php

namespace App\Http\Controllers\Management;

use App\Models\CognitiveTl;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CognitiveTlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $CognitiveTl = CognitiveTl::select();

        if ($request->_sort) {
            $CognitiveTl->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $CognitiveTl->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $CognitiveTl = $CognitiveTl->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $CognitiveTl = $CognitiveTl->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Cognitivo obtenidos exitosamente',
            'data' => ['cognitive_tl' => $CognitiveTl]
        ]);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id,int $type_record_id): JsonResponse
    {
        
       
        $CognitiveTl = CognitiveTl::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Cognitivo asociado al paciente exitosamente',
            'data' => ['cognitive_tl' => $CognitiveTl]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $CognitiveTl = new CognitiveTl;
        $CognitiveTl->memory = $request->memory;
        $CognitiveTl->attention = $request->attention;
        $CognitiveTl->concentration = $request->concentration;
        $CognitiveTl->observations = $request->observations;
        $CognitiveTl->type_record_id = $request->type_record_id;
        $CognitiveTl->ch_record_id = $request->ch_record_id;
        $CognitiveTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Cognitivo asociado al paciente exitosamente',
            'data' => ['cognitive_tl' => $CognitiveTl->toArray()]
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
        $CognitiveTl = CognitiveTl::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cognitivo obtenido exitosamente',
            'data' => ['cognitive_tl' => $CognitiveTl]
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
        $CognitiveTl = CognitiveTl::find($id);
        $CognitiveTl->memory = $request->memory;
        $CognitiveTl->attention = $request->attention;
        $CognitiveTl->concentration = $request->concentration;
        $CognitiveTl->observations = $request->observations;
        $CognitiveTl->type_record_id = $request->type_record_id;
        $CognitiveTl->ch_record_id = $request->ch_record_id;
        $CognitiveTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Cognitivo actualizado exitosamente',
            'data' => ['cognitive_tl' => $CognitiveTl]
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
            $CognitiveTl = CognitiveTl::find($id);
            $CognitiveTl->delete();

            return response()->json([
                'status' => true,
                'message' => 'Cognitivo eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Cognitivo en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
