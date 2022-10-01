<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsPsychomotricity;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChPsPsychomotricityController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsPsychomotricity = ChPsPsychomotricity::select();

        if($request->_sort){
            $ChPsPsychomotricity->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChPsPsychomotricity->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChPsPsychomotricity=$ChPsPsychomotricity->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChPsPsychomotricity=$ChPsPsychomotricity->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Aspectos de psicomotricidad obtenidas exitosamente',
            'data' => ['ch_ps_psychomotricity' => $ChPsPsychomotricity]
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
        
       
        $ChPsPsychomotricity = ChPsPsychomotricity::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de psicomotricidad obtenidas exitosamente',
            'data' => ['ch_ps_psychomotricity' => $ChPsPsychomotricity]
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $ChPsPsychomotricity = new ChPsPsychomotricity;
        $ChPsPsychomotricity->name = $request->name; 
        $ChPsPsychomotricity->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de psicomotricidad asociadas al paciente exitosamente',
            'data' => ['ch_ps_psychomotricity' => $ChPsPsychomotricity->toArray()]
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
        $ChPsPsychomotricity = ChPsPsychomotricity::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de psicomotricidad obtenidas exitosamente',
            'data' => ['ch_ps_psychomotricity' => $ChPsPsychomotricity]
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
        $ChPsPsychomotricity = ChPsPsychomotricity::find($id);  
        $ChPsPsychomotricity->name = $request->name; 
        $ChPsPsychomotricity->save();

        return response()->json([
            'status' => true,
            'message' => 'Aspectos de psicomotricidad actualizadas exitosamente',
            'data' => ['ch_ps_psychomotricity' => $ChPsPsychomotricity]
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
            $ChPsPsychomotricity = ChPsPsychomotricity::find($id);
            $ChPsPsychomotricity->delete();

            return response()->json([
                'status' => true,
                'message' => 'Aspectos de psicomotricidad eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Aspectos de psicomotricidad en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
