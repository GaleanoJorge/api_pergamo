<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwHours;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChSwHoursController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwHours = ChSwHours::select();

        if($request->_sort){
            $ChSwHours->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChSwHours->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChSwHours=$ChSwHours->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChSwHours=$ChSwHours->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Horario laboral obtenido exitosamente',
            'data' => ['ch_sw_hours' => $ChSwHours]
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
        
       
        $ChSwHours = ChSwHours::where('ch_record_id', $id)
        ->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Horario laboral obtenidas exitosamente',
            'data' => ['ch_sw_hours' => $ChSwHours]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChSwHours = new ChSwHours;
        $ChSwHours->name = $request->name; 
        $ChSwHours->save();

        return response()->json([
            'status' => true,
            'message' => 'Horario laboral asociado al paciente exitosamente',
            'data' => ['ch_sw_hours' => $ChSwHours->toArray()]
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
        $ChSwHours = ChSwHours::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Horario laboral obtenido exitosamente',
            'data' => ['ch_sw_hours' => $ChSwHours]
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
        $ChSwHours = ChSwHours::find($id);  
        $ChSwHours->name = $request->name; 
        $ChSwHours->save();

        return response()->json([
            'status' => true,
            'message' => 'Horario laboral actualizado exitosamente',
            'data' => ['ch_sw_hours' => $ChSwHours]
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
            $ChSwHours = ChSwHours::find($id);
            $ChSwHours->delete();

            return response()->json([
                'status' => true,
                'message' => 'Horario laboral eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Horario laboral en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
