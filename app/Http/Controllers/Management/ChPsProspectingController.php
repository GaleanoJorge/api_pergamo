<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsProspecting;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsProspectingController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsProspecting = ChPsProspecting::select();

        if($request->_sort){
            $ChPsProspecting->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsProspecting->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsProspecting=$ChPsProspecting->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsProspecting=$ChPsProspecting->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Aspectos de prospección obtenidas exitosamente',
            'data' => ['ch_ps_prospecting' => $ChPsProspecting]
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
        
       
        $ChPsProspecting = ChPsProspecting::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de prospección obtenidas exitosamente',
            'data' => ['ch_ps_prospecting' => $ChPsProspecting]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsProspecting = new ChPsProspecting;
        $ChPsProspecting->name = $request->name; 
        $ChPsProspecting->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de prospección asociadas al paciente exitosamente',
            'data' => ['ch_ps_prospecting' => $ChPsProspecting->toArray()]
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
        $ChPsProspecting = ChPsProspecting::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de prospección obtenidas exitosamente',
            'data' => ['ch_ps_prospecting' => $ChPsProspecting]
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
        $ChPsProspecting = ChPsProspecting::find($id);  
        $ChPsProspecting->name = $request->name; 
        $ChPsProspecting->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de prospección actualizadas exitosamente',
            'data' => ['ch_ps_prospecting' => $ChPsProspecting]
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
            $ChPsProspecting = ChPsProspecting::find($id);
            $ChPsProspecting->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aspectos de prospección eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aspectos de prospección en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
