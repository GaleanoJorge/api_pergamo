<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwEntity;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChSwEntityController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwEntity = ChSwEntity::select();

        if($request->_sort){
            $ChSwEntity->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChSwEntity->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChSwEntity=$ChSwEntity->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChSwEntity=$ChSwEntity->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Entidades obtenidas exitosamente',
            'data' => ['ch_sw_entity' => $ChSwEntity]
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
        
       
        $ChSwEntity = ChSwEntity::where('ch_record_id', $id)
        ->where('type_record_id',$type_record_id)
        ->where('ch_sw_entity.type_record_id', 1)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Entidades obtenidas exitosamente',
            'data' => ['ch_sw_entity' => $ChSwEntity]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChSwEntity = new ChSwEntity;
        $ChSwEntity->name = $request->name; 
        $ChSwEntity->save();

        return response()->json([
            'status' => true,
            'message' => 'Entidades asociadas al paciente exitosamente',
            'data' => ['ch_sw_entity' => $ChSwEntity->toArray()]
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
        $ChSwEntity = ChSwEntity::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Entidades obtenidas exitosamente',
            'data' => ['ch_sw_entity' => $ChSwEntity]
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
        $ChSwEntity = ChSwEntity::find($id);  
        $ChSwEntity->name = $request->name; 
        $ChSwEntity->save();

        return response()->json([
            'status' => true,
            'message' => 'Entidades actualizadas exitosamente',
            'data' => ['ch_sw_entity' => $ChSwEntity]
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
            $ChSwEntity = ChSwEntity::find($id);
            $ChSwEntity->delete();

            return response()->json([
                'status' => true,
                'message' => 'Entidades eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Entidades en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
