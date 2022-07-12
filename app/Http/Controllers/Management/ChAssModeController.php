<?php

namespace App\Http\Controllers\Management;

use App\Models\ChAssMode;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChAssModeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChAssMode = ChAssMode::select();

        if($request->_sort){
            $ChAssMode->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChAssMode->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChAssMode=$ChAssMode->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChAssMode=$ChAssMode->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Modo ventilatorio obtenidos exitosamente',
            'data' => ['ch_ass_mode' => $ChAssMode]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChAssMode = new ChAssMode; 
        $ChAssMode->name = $request->name; 
        $ChAssMode->type_record_id = $request->type_record_id; 
        $ChAssMode->ch_record_id = $request->ch_record_id;  
        $ChAssMode->save();

        return response()->json([
            'status' => true,
            'message' => 'Modo ventilatorio asociado al paciente exitosamente',
            'data' => ['ch_ass_mode' => $ChAssMode->toArray()]
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
        $ChAssMode = ChAssMode::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Modo ventilatorio obtenido exitosamente',
            'data' => ['ch_ass_mode' => $ChAssMode]
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
        $ChAssMode = ChAssMode::find($id);  
        $ChAssMode->name = $request->name; 
        $ChAssMode->type_record_id = $request->type_record_id; 
        $ChAssMode->ch_record_id = $request->ch_record_id;  
        $ChAssMode->save();

        return response()->json([
            'status' => true,
            'message' => 'Modo ventilatorio actualizado exitosamente',
            'data' => ['ch_ass_mode' => $ChAssMode]
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
            $ChAssMode = ChAssMode::find($id);
            $ChAssMode->delete();

            return response()->json([
                'status' => true,
                'message' => 'Modo ventilatorioeliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Modo ventilatorioen uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
