<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsAttitude;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsAttitudeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsAttitude = ChPsAttitude::select();

        if($request->_sort){
            $ChPsAttitude->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsAttitude->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsAttitude=$ChPsAttitude->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsAttitude=$ChPsAttitude->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Actitud obtenidas exitosamente',
            'data' => ['ch_ps_attitude' => $ChPsAttitude]
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
        
       
        $ChPsAttitude = ChPsAttitude::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Actitud obtenidas exitosamente',
            'data' => ['ch_ps_attitude' => $ChPsAttitude]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsAttitude = new ChPsAttitude;
        $ChPsAttitude->name = $request->name; 
        $ChPsAttitude->save();

        return response()->json([
            'status' => true,
            'message' => 'Actitud asociadas al paciente exitosamente',
            'data' => ['ch_ps_attitude' => $ChPsAttitude->toArray()]
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
        $ChPsAttitude = ChPsAttitude::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Actitud obtenidas exitosamente',
            'data' => ['ch_ps_attitude' => $ChPsAttitude]
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
        $ChPsAttitude = ChPsAttitude::find($id);  
        $ChPsAttitude->name = $request->name; 
        $ChPsAttitude->save();

        return response()->json([
            'status' => true,
            'message' => 'Actitud actualizadas exitosamente',
            'data' => ['ch_ps_attitude' => $ChPsAttitude]
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
            $ChPsAttitude = ChPsAttitude::find($id);
            $ChPsAttitude->delete();

            return response()->json([
                'status' => true,
                'message' => 'Actitud eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Actitud en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
