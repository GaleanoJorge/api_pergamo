<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsJoy;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsJoyController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsJoy = ChPsJoy::select();

        if($request->_sort){
            $ChPsJoy->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsJoy->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsJoy=$ChPsJoy->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsJoy=$ChPsJoy->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Aspectos de alegria obtenidas exitosamente',
            'data' => ['ch_ps_joy' => $ChPsJoy]
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
        
       
        $ChPsJoy = ChPsJoy::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de alegria obtenidas exitosamente',
            'data' => ['ch_ps_joy' => $ChPsJoy]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsJoy = new ChPsJoy;
        $ChPsJoy->name = $request->name; 
        $ChPsJoy->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de alegria asociadas al paciente exitosamente',
            'data' => ['ch_ps_joy' => $ChPsJoy->toArray()]
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
        $ChPsJoy = ChPsJoy::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de alegria obtenidas exitosamente',
            'data' => ['ch_ps_joy' => $ChPsJoy]
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
        $ChPsJoy = ChPsJoy::find($id);  
        $ChPsJoy->name = $request->name; 
        $ChPsJoy->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de alegria actualizadas exitosamente',
            'data' => ['ch_ps_joy' => $ChPsJoy]
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
            $ChPsJoy = ChPsJoy::find($id);
            $ChPsJoy->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aspectos de alegria eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aspectos de alegria en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
