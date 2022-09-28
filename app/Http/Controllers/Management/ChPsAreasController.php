<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsAreas;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsAreasController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsAreas = ChPsAreas::select();

        if($request->_sort){
            $ChPsAreas->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsAreas->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsAreas=$ChPsAreas->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsAreas=$ChPsAreas->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Areas obtenidas exitosamente',
            'data' => ['ch_ps_areas' => $ChPsAreas]
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
        
       
        $ChPsAreas = ChPsAreas::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Areas obtenidas exitosamente',
            'data' => ['ch_ps_areas' => $ChPsAreas]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsAreas = new ChPsAreas;
        $ChPsAreas->name = $request->name; 
        $ChPsAreas->save();

        return response()->json([
            'status' => true,
            'message' => 'Areas asociadas al paciente exitosamente',
            'data' => ['ch_ps_areas' => $ChPsAreas->toArray()]
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
        $ChPsAreas = ChPsAreas::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Areas obtenidas exitosamente',
            'data' => ['ch_ps_areas' => $ChPsAreas]
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
        $ChPsAreas = ChPsAreas::find($id);  
        $ChPsAreas->name = $request->name; 
        $ChPsAreas->save();

        return response()->json([
            'status' => true,
            'message' => 'Areas actualizadas exitosamente',
            'data' => ['ch_ps_areas' => $ChPsAreas]
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
            $ChPsAreas = ChPsAreas::find($id);
            $ChPsAreas->delete();

            return response()->json([
                'status' => true,
                'message' => 'Areas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Areas en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
