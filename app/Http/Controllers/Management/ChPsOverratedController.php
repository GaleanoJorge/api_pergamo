<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsOverrated;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsOverratedController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsOverrated = ChPsOverrated::select();

        if($request->_sort){
            $ChPsOverrated->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsOverrated->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsOverrated=$ChPsOverrated->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsOverrated=$ChPsOverrated->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Aspectos de Sobrevalorados obtenidas exitosamente',
            'data' => ['ch_ps_overrated' => $ChPsOverrated]
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
        
       
        $ChPsOverrated = ChPsOverrated::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de Sobrevalorados obtenidas exitosamente',
            'data' => ['ch_ps_overrated' => $ChPsOverrated]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsOverrated = new ChPsOverrated;
        $ChPsOverrated->name = $request->name; 
        $ChPsOverrated->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de Sobrevalorados asociadas al paciente exitosamente',
            'data' => ['ch_ps_overrated' => $ChPsOverrated->toArray()]
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
        $ChPsOverrated = ChPsOverrated::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de Sobrevalorados obtenidas exitosamente',
            'data' => ['ch_ps_overrated' => $ChPsOverrated]
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
        $ChPsOverrated = ChPsOverrated::find($id);  
        $ChPsOverrated->name = $request->name; 
        $ChPsOverrated->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de Sobrevalorados actualizadas exitosamente',
            'data' => ['ch_ps_overrated' => $ChPsOverrated]
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
            $ChPsOverrated = ChPsOverrated::find($id);
            $ChPsOverrated->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aspectos de Sobrevalorados eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aspectos de Sobrevalorados en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
