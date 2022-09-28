<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsSleep;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsSleepController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsSleep = ChPsSleep::select();

        if($request->_sort){
            $ChPsSleep->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsSleep->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsSleep=$ChPsSleep->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsSleep=$ChPsSleep->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Sueño obtenidas exitosamente',
            'data' => ['ch_ps_sleep' => $ChPsSleep]
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
        
       
        $ChPsSleep = ChPsSleep::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Sueño obtenidas exitosamente',
            'data' => ['ch_ps_sleep' => $ChPsSleep]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsSleep = new ChPsSleep;
        $ChPsSleep->name = $request->name; 
        $ChPsSleep->save();

        return response()->json([
            'status' => true,
            'message' => 'Sueño asociadas al paciente exitosamente',
            'data' => ['ch_ps_sleep' => $ChPsSleep->toArray()]
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
        $ChPsSleep = ChPsSleep::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Sueño obtenidas exitosamente',
            'data' => ['ch_ps_sleep' => $ChPsSleep]
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
        $ChPsSleep = ChPsSleep::find($id);  
        $ChPsSleep->name = $request->name; 
        $ChPsSleep->save();

        return response()->json([
            'status' => true,
            'message' => 'Sueño actualizadas exitosamente',
            'data' => ['ch_ps_sleep' => $ChPsSleep]
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
            $ChPsSleep = ChPsSleep::find($id);
            $ChPsSleep->delete();

            return response()->json([
                'status' => true,
                'message' => 'Sueño eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Sueño en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
