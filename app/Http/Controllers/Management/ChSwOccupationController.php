<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwOccupation;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChSwOccupationController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwOccupation = ChSwOccupation::select();

        if($request->_sort){
            $ChSwOccupation->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChSwOccupation->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChSwOccupation=$ChSwOccupation->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChSwOccupation=$ChSwOccupation->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Ocupación obtenidas exitosamente',
            'data' => ['ch_sw_occupation' => $ChSwOccupation]
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
        
       
        $ChSwOccupation = ChSwOccupation::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Ocupación obtenidas exitosamente',
            'data' => ['ch_sw_occupation' => $ChSwOccupation]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChSwOccupation = new ChSwOccupation;
        $ChSwOccupation->name = $request->name; 
        $ChSwOccupation->save();

        return response()->json([
            'status' => true,
            'message' => 'Ocupación asociadas al paciente exitosamente',
            'data' => ['ch_sw_occupation' => $ChSwOccupation->toArray()]
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
        $ChSwOccupation = ChSwOccupation::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Ocupación obtenidas exitosamente',
            'data' => ['ch_sw_occupation' => $ChSwOccupation]
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
        $ChSwOccupation = ChSwOccupation::find($id);  
        $ChSwOccupation->name = $request->name; 
        $ChSwOccupation->save();

        return response()->json([
            'status' => true,
            'message' => 'Ocupación actualizadas exitosamente',
            'data' => ['ch_sw_occupation' => $ChSwOccupation]
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
            $ChSwOccupation = ChSwOccupation::find($id);
            $ChSwOccupation->delete();

            return response()->json([
                'status' => true,
                'message' => 'Ocupación eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Ocupación en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
