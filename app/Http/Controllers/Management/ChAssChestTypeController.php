<?php

namespace App\Http\Controllers\Management;

use App\Models\ChAssChestType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChAssChestTypeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChAssChestType = ChAssChestType::select();

        if($request->_sort){
            $ChAssChestType->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChAssChestType->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChAssChestType=$ChAssChestType->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChAssChestType=$ChAssChestType->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Tipo de torax obtenidos exitosamente',
            'data' => ['ch_ass_chest_type' => $ChAssChestType]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChAssChestType = new ChAssChestType; 
        $ChAssChestType->name = $request->name;        
        $ChAssChestType->type_record_id = $request->type_record_id; 
        $ChAssChestType->ch_record_id = $request->ch_record_id;  
        $ChAssChestType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de torax asociado al paciente exitosamente',
            'data' => ['ch_ass_chest_type' => $ChAssChestType->toArray()]
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
        $ChAssChestType = ChAssChestType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de torax obtenido exitosamente',
            'data' => ['ch_ass_chest_type' => $ChAssChestType]
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
        $ChAssChestType = ChAssChestType::find($id);  
        $ChAssChestType->name = $request->name; 
        $ChAssChestType->type_record_id = $request->type_record_id; 
        $ChAssChestType->ch_record_id = $request->ch_record_id;  
        $ChAssChestType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de torax actualizado exitosamente',
            'data' => ['ch_ass_chest_type' => $ChAssChestType]
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
            $ChAssChestType = ChAssChestType::find($id);
            $ChAssChestType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Toseliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tosen uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
