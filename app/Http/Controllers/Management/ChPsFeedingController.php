<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsFeeding;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsFeedingController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsFeeding = ChPsFeeding::select();

        if($request->_sort){
            $ChPsFeeding->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsFeeding->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsFeeding=$ChPsFeeding->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsFeeding=$ChPsFeeding->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Aspectos de alimentación obtenidas exitosamente',
            'data' => ['ch_ps_feeding' => $ChPsFeeding]
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
        
       
        $ChPsFeeding = ChPsFeeding::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de alimentación obtenidas exitosamente',
            'data' => ['ch_ps_feeding' => $ChPsFeeding]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsFeeding = new ChPsFeeding;
        $ChPsFeeding->name = $request->name; 
        $ChPsFeeding->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de alimentación asociadas al paciente exitosamente',
            'data' => ['ch_ps_feeding' => $ChPsFeeding->toArray()]
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
        $ChPsFeeding = ChPsFeeding::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de alimentación obtenidas exitosamente',
            'data' => ['ch_ps_feeding' => $ChPsFeeding]
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
        $ChPsFeeding = ChPsFeeding::find($id);  
        $ChPsFeeding->name = $request->name; 
        $ChPsFeeding->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de alimentación actualizadas exitosamente',
            'data' => ['ch_ps_feeding' => $ChPsFeeding]
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
            $ChPsFeeding = ChPsFeeding::find($id);
            $ChPsFeeding->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aspectos de alimentación eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aspectos de alimentación en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
