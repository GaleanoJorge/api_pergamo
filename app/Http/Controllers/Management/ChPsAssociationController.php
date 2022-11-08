<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsAssociation;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsAssociationController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsAssociation = ChPsAssociation::select();

        if($request->_sort){
            $ChPsAssociation->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsAssociation->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsAssociation=$ChPsAssociation->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsAssociation=$ChPsAssociation->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Asociación o desorganización  obtenidas exitosamente',
            'data' => ['ch_ps_association' => $ChPsAssociation]
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
        
       
        $ChPsAssociation = ChPsAssociation::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Asociación o desorganización  obtenidas exitosamente',
            'data' => ['ch_ps_association' => $ChPsAssociation]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsAssociation = new ChPsAssociation;
        $ChPsAssociation->name = $request->name; 
        $ChPsAssociation->save();

        return response()->json([
            'status' => true,
            'message' => 'Asociación o desorganización  asociadas al paciente exitosamente',
            'data' => ['ch_ps_association' => $ChPsAssociation->toArray()]
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
        $ChPsAssociation = ChPsAssociation::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Asociación o desorganización  obtenidas exitosamente',
            'data' => ['ch_ps_association' => $ChPsAssociation]
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
        $ChPsAssociation = ChPsAssociation::find($id);  
        $ChPsAssociation->name = $request->name; 
        $ChPsAssociation->save();

        return response()->json([
            'status' => true,
            'message' => 'Asociación o desorganización  actualizadas exitosamente',
            'data' => ['ch_ps_association' => $ChPsAssociation]
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
            $ChPsAssociation = ChPsAssociation::find($id);
            $ChPsAssociation->delete();

            return response()->json([
                'status' => true,
                'message' => 'Asociación o desorganización  eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Asociación o desorganización  en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
