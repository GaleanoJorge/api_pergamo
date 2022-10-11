<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsIntrospection;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsIntrospectionController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsIntrospection = ChPsIntrospection::select();

        if($request->_sort){
            $ChPsIntrospection->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsIntrospection->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsIntrospection=$ChPsIntrospection->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsIntrospection=$ChPsIntrospection->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Aspectos de introspección obtenidas exitosamente',
            'data' => ['ch_ps_introspection' => $ChPsIntrospection]
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
        
       
        $ChPsIntrospection = ChPsIntrospection::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de introspección obtenidas exitosamente',
            'data' => ['ch_ps_introspection' => $ChPsIntrospection]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsIntrospection = new ChPsIntrospection;
        $ChPsIntrospection->name = $request->name; 
        $ChPsIntrospection->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de introspección asociadas al paciente exitosamente',
            'data' => ['ch_ps_introspection' => $ChPsIntrospection->toArray()]
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
        $ChPsIntrospection = ChPsIntrospection::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de introspección obtenidas exitosamente',
            'data' => ['ch_ps_introspection' => $ChPsIntrospection]
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
        $ChPsIntrospection = ChPsIntrospection::find($id);  
        $ChPsIntrospection->name = $request->name; 
        $ChPsIntrospection->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de introspección actualizadas exitosamente',
            'data' => ['ch_ps_introspection' => $ChPsIntrospection]
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
            $ChPsIntrospection = ChPsIntrospection::find($id);
            $ChPsIntrospection->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aspectos de introspección eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aspectos de introspección en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
