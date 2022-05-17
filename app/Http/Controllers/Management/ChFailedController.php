<?php

namespace App\Http\Controllers\Management;

use App\Models\ChFailed;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChFailedRequest;
use Illuminate\Database\QueryException;

class ChFailedController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChFailed = ChFailed::select();

        if($request->_sort){
            $ChFailed->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChFailed->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChFailed=$ChFailed->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChFailed=$ChFailed->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Visita Fallida  obtenidos exitosamente',
            'data' => ['ch_failed' => $ChFailed]
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
        $ChFailed = ChFailed::with('ch_reason',) ->where('ch_record_id', $id)
        ->where('type_record_id',$type_record_id);
        
        if ($request->query("pagination", true) == "false") {
            $ChFailed = $ChFailed->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChFailed = $ChFailed->paginate($per_page, '*', 'page', $page);
        }
        

        return response()->json([
            'status' => true,
            'message' => 'Formula del paciente exitosamente',
            'data' => ['ch_failed' => $ChFailed]
        ]);
    }

    public function store(ChFailedRequest $request): JsonResponse
    {
        $ChFailed = new ChFailed;
        $ChFailed->descriptions = $request->descriptions;   
        $ChFailed->file_evidence = $request->file_evidence; 
        $ChFailed->ch_reason_id = $request->ch_reason_id;  
        $ChFailed->type_record_id = $request->type_record_id; 
        $ChFailed->ch_record_id = $request->ch_record_id; 

        $ChFailed->save();

        return response()->json([
            'status' => true,
            'message' => 'Visita Fallida  creado exitosamente',
            'data' => ['ch_failed' => $ChFailed->toArray()]
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
        $ChFailed = ChFailed::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Visita Fallida  obtenido exitosamente',
            'data' => ['ch_failed' => $ChFailed]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ChFailedRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChFailedRequest $request, int $id): JsonResponse
    {
        $ChFailed = ChFailed ::find($id);
        $ChFailed->descriptions = $request->descriptions;   
        $ChFailed->file_evidence = $request->file_evidence; 
        $ChFailed->ch_reason_id = $request->ch_reason_id; 
        $ChFailed->type_record_id = $request->type_record_id; 
        $ChFailed->ch_record_id = $request->ch_record_id;    
        $ChFailed->save();

        return response()->json([
            'status' => true,
            'message' => 'Visita Fallida  actualizado exitosamente',
            'data' => ['ch_failed' => $ChFailed]
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
            $ChFailed = ChFailed::find($id);
            $ChFailed->delete();

            return response()->json([
                'status' => true,
                'message' => 'Visita Fallida  eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Visita Fallida  esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
