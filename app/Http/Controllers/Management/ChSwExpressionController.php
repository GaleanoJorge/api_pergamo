<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwExpression;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChSwExpressionController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwExpression = ChSwExpression::select();

        if($request->_sort){
            $ChSwExpression->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChSwExpression->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChSwExpression=$ChSwExpression->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChSwExpression=$ChSwExpression->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Expresión del paciente obtenidas exitosamente',
            'data' => ['ch_sw_expression' => $ChSwExpression]
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
        
       
        $ChSwExpression = ChSwExpression::where('ch_record_id', $id)
        ->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Expresión del paciente obtenidas exitosamente',
            'data' => ['ch_sw_expression' => $ChSwExpression]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChSwExpression = new ChSwExpression;
        $ChSwExpression->name = $request->name; 
        $ChSwExpression->save();

        return response()->json([
            'status' => true,
            'message' => 'Expresión del paciente asociadas exitosamente',
            'data' => ['ch_sw_expression' => $ChSwExpression->toArray()]
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
        $ChSwExpression = ChSwExpression::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Expresión del paciente obtenidas exitosamente',
            'data' => ['ch_sw_expression' => $ChSwExpression]
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
        $ChSwExpression = ChSwExpression::find($id);  
        $ChSwExpression->name = $request->name; 
        $ChSwExpression->save();

        return response()->json([
            'status' => true,
            'message' => 'Expresión del paciente actualizadas exitosamente',
            'data' => ['ch_sw_expression' => $ChSwExpression]
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
            $ChSwExpression = ChSwExpression::find($id);
            $ChSwExpression->delete();

            return response()->json([
                'status' => true,
                'message' => 'Expresión del paciente eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Expresión del paciente en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
