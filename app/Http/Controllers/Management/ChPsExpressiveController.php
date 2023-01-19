<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsExpressive;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsExpressiveController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsExpressive = ChPsExpressive::select();

        if($request->_sort){
            $ChPsExpressive->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsExpressive->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsExpressive=$ChPsExpressive->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsExpressive=$ChPsExpressive->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Opciones de expresión obtenidas exitosamente',
            'data' => ['ch_ps_expressive' => $ChPsExpressive]
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
        
       
        $ChPsExpressive = ChPsExpressive::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Opciones de expresión obtenidas exitosamente',
            'data' => ['ch_ps_expressive' => $ChPsExpressive]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsExpressive = new ChPsExpressive;
        $ChPsExpressive->name = $request->name; 
        $ChPsExpressive->save();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de expresión asociadas al paciente exitosamente',
            'data' => ['ch_ps_expressive' => $ChPsExpressive->toArray()]
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
        $ChPsExpressive = ChPsExpressive::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de expresión obtenidas exitosamente',
            'data' => ['ch_ps_expressive' => $ChPsExpressive]
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
        $ChPsExpressive = ChPsExpressive::find($id);  
        $ChPsExpressive->name = $request->name; 
        $ChPsExpressive->save();

        return response()->json([
            'status' => true,
            'message' => 'Opciones de expresión actualizadas exitosamente',
            'data' => ['ch_ps_expressive' => $ChPsExpressive]
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
            $ChPsExpressive = ChPsExpressive::find($id);
            $ChPsExpressive->delete();

            return response()->json([
                'status' => true,
                'message' => 'Opciones de expresión eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Opciones de expresión en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
