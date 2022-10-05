<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsSexuality;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsSexualityController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsSexuality = ChPsSexuality::select();

        if($request->_sort){
            $ChPsSexuality->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsSexuality->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsSexuality=$ChPsSexuality->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsSexuality=$ChPsSexuality->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Aspectos de sexualidad obtenidas exitosamente',
            'data' => ['ch_ps_sexuality' => $ChPsSexuality]
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
        
       
        $ChPsSexuality = ChPsSexuality::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de sexualidad obtenidas exitosamente',
            'data' => ['ch_ps_sexuality' => $ChPsSexuality]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsSexuality = new ChPsSexuality;
        $ChPsSexuality->name = $request->name; 
        $ChPsSexuality->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de sexualidad asociadas al paciente exitosamente',
            'data' => ['ch_ps_sexuality' => $ChPsSexuality->toArray()]
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
        $ChPsSexuality = ChPsSexuality::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de sexualidad obtenidas exitosamente',
            'data' => ['ch_ps_sexuality' => $ChPsSexuality]
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
        $ChPsSexuality = ChPsSexuality::find($id);  
        $ChPsSexuality->name = $request->name; 
        $ChPsSexuality->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de sexualidad actualizadas exitosamente',
            'data' => ['ch_ps_sexuality' => $ChPsSexuality]
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
            $ChPsSexuality = ChPsSexuality::find($id);
            $ChPsSexuality->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aspectos de sexualidad eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aspectos de sexualidad en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
