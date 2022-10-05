<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsObsessive;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsObsessiveController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsObsessive = ChPsObsessive::select();

        if($request->_sort){
            $ChPsObsessive->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsObsessive->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsObsessive=$ChPsObsessive->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsObsessive=$ChPsObsessive->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Aspectos de obsesivos obtenidas exitosamente',
            'data' => ['ch_ps_obsessive' => $ChPsObsessive]
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
        
       
        $ChPsObsessive = ChPsObsessive::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de obsesivos obtenidas exitosamente',
            'data' => ['ch_ps_obsessive' => $ChPsObsessive]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsObsessive = new ChPsObsessive;
        $ChPsObsessive->name = $request->name; 
        $ChPsObsessive->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de obsesivos asociadas al paciente exitosamente',
            'data' => ['ch_ps_obsessive' => $ChPsObsessive->toArray()]
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
        $ChPsObsessive = ChPsObsessive::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de obsesivos obtenidas exitosamente',
            'data' => ['ch_ps_obsessive' => $ChPsObsessive]
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
        $ChPsObsessive = ChPsObsessive::find($id);  
        $ChPsObsessive->name = $request->name; 
        $ChPsObsessive->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de obsesivos actualizadas exitosamente',
            'data' => ['ch_ps_obsessive' => $ChPsObsessive]
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
            $ChPsObsessive = ChPsObsessive::find($id);
            $ChPsObsessive->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aspectos de obsesivos eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aspectos de obsesivos en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
