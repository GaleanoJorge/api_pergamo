<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsAnger;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsAngerController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsAnger = ChPsAnger::select();

        if($request->_sort){
            $ChPsAnger->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsAnger->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsAnger=$ChPsAnger->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsAnger=$ChPsAnger->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Aspectos de ira obtenidas exitosamente',
            'data' => ['ch_ps_anger' => $ChPsAnger]
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
        
       
        $ChPsAnger = ChPsAnger::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de ira obtenidas exitosamente',
            'data' => ['ch_ps_anger' => $ChPsAnger]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsAnger = new ChPsAnger;
        $ChPsAnger->name = $request->name; 
        $ChPsAnger->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de ira asociadas al paciente exitosamente',
            'data' => ['ch_ps_anger' => $ChPsAnger->toArray()]
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
        $ChPsAnger = ChPsAnger::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de ira obtenidas exitosamente',
            'data' => ['ch_ps_anger' => $ChPsAnger]
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
        $ChPsAnger = ChPsAnger::find($id);  
        $ChPsAnger->name = $request->name; 
        $ChPsAnger->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de ira actualizadas exitosamente',
            'data' => ['ch_ps_anger' => $ChPsAnger]
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
            $ChPsAnger = ChPsAnger::find($id);
            $ChPsAnger->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aspectos de ira eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aspectos de ira en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
