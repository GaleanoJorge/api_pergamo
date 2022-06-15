<?php

namespace App\Http\Controllers\Management;

use App\Models\ChAssSwing;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChAssSwingController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChAssSwing = ChAssSwing::select();

        if($request->_sort){
            $ChAssSwing->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChAssSwing->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChAssSwing=$ChAssSwing->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChAssSwing=$ChAssSwing->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Patron respiratorio obtenidos exitosamente',
            'data' => ['ch_ass_swing' => $ChAssSwing]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChAssSwing = new ChAssSwing; 
        $ChAssSwing->name = $request->name; 
        $ChAssSwing->type_record_id = $request->type_record_id; 
        $ChAssSwing->ch_record_id = $request->ch_record_id;
        $ChAssSwing->save();

        return response()->json([
            'status' => true,
            'message' => 'Patron respiratorio asociado al paciente exitosamente',
            'data' => ['ch_ass_swing' => $ChAssSwing->toArray()]
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
        $ChAssSwing = ChAssSwing::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Patron respiratorio obtenido exitosamente',
            'data' => ['ch_ass_swing' => $ChAssSwing]
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
        $ChAssSwing = ChAssSwing::find($id);  
        $ChAssSwing->name = $request->name; 
        $ChAssSwing->type_record_id = $request->type_record_id; 
        $ChAssSwing->ch_record_id = $request->ch_record_id;
        $ChAssSwing->save();

        return response()->json([
            'status' => true,
            'message' => 'Patron respiratorio actualizado exitosamente',
            'data' => ['ch_ass_swing' => $ChAssSwing]
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
            $ChAssSwing = ChAssSwing::find($id);
            $ChAssSwing->delete();

            return response()->json([
                'status' => true,
                'message' => 'Patron respiratorioeliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Patron respiratorioen uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
