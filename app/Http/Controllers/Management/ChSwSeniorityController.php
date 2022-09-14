<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwSeniority;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChSwSeniorityController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwSeniority = ChSwSeniority::select();

        if($request->_sort){
            $ChSwSeniority->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChSwSeniority->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChSwSeniority=$ChSwSeniority->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChSwSeniority=$ChSwSeniority->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Antigüedad laboral obtenidas exitosamente',
            'data' => ['ch_sw_seniority' => $ChSwSeniority]
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
        
       
        $ChSwSeniority = ChSwSeniority::where('ch_record_id', $id)
        ->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Antigüedad laboral obtenidas exitosamente',
            'data' => ['ch_sw_seniority' => $ChSwSeniority]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChSwSeniority = new ChSwSeniority;
        $ChSwSeniority->name = $request->name; 
        $ChSwSeniority->save();

        return response()->json([
            'status' => true,
            'message' => 'Antigüedad laboral asociadas al paciente exitosamente',
            'data' => ['ch_sw_seniority' => $ChSwSeniority->toArray()]
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
        $ChSwSeniority = ChSwSeniority::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Antigüedad laboral obtenidas exitosamente',
            'data' => ['ch_sw_seniority' => $ChSwSeniority]
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
        $ChSwSeniority = ChSwSeniority::find($id);  
        $ChSwSeniority->name = $request->name; 
        $ChSwSeniority->save();

        return response()->json([
            'status' => true,
            'message' => 'Antigüedad laboral actualizadas exitosamente',
            'data' => ['ch_sw_seniority' => $ChSwSeniority]
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
            $ChSwSeniority = ChSwSeniority::find($id);
            $ChSwSeniority->delete();

            return response()->json([
                'status' => true,
                'message' => 'Antigüedad laboral eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Antigüedad laboral en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
