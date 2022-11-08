<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsSpeed;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsSpeedController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsSpeed = ChPsSpeed::select();

        if($request->_sort){
            $ChPsSpeed->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsSpeed->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsSpeed=$ChPsSpeed->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsSpeed=$ChPsSpeed->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Aspectos de velocidad obtenidas exitosamente',
            'data' => ['ch_ps_speed' => $ChPsSpeed]
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
        
       
        $ChPsSpeed = ChPsSpeed::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de velocidad obtenidas exitosamente',
            'data' => ['ch_ps_speed' => $ChPsSpeed]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsSpeed = new ChPsSpeed;
        $ChPsSpeed->name = $request->name; 
        $ChPsSpeed->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de velocidad asociadas al paciente exitosamente',
            'data' => ['ch_ps_speed' => $ChPsSpeed->toArray()]
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
        $ChPsSpeed = ChPsSpeed::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de velocidad obtenidas exitosamente',
            'data' => ['ch_ps_speed' => $ChPsSpeed]
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
        $ChPsSpeed = ChPsSpeed::find($id);  
        $ChPsSpeed->name = $request->name; 
        $ChPsSpeed->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de velocidad actualizadas exitosamente',
            'data' => ['ch_ps_speed' => $ChPsSpeed]
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
            $ChPsSpeed = ChPsSpeed::find($id);
            $ChPsSpeed->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aspectos de velocidad eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aspectos de velocidad en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
