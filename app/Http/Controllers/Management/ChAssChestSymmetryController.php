<?php

namespace App\Http\Controllers\Management;

use App\Models\ChAssChestSymmetry;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChAssChestSymmetryController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChAssChestSymmetry = ChAssChestSymmetry::select();

        if($request->_sort){
            $ChAssChestSymmetry->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChAssChestSymmetry->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChAssChestSymmetry=$ChAssChestSymmetry->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChAssChestSymmetry=$ChAssChestSymmetry->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Simetria de torax obtenidos exitosamente',
            'data' => ['ch_ass_chest_symmetry' => $ChAssChestSymmetry]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChAssChestSymmetry = new ChAssChestSymmetry; 
        $ChAssChestSymmetry->name = $request->name; 
        $ChAssChestSymmetry->type_record_id = $request->type_record_id; 
        $ChAssChestSymmetry->ch_record_id = $request->ch_record_id; 
        $ChAssChestSymmetry->save();

        return response()->json([
            'status' => true,
            'message' => 'Simetria de torax asociado al paciente exitosamente',
            'data' => ['ch_ass_chest_symmetry' => $ChAssChestSymmetry->toArray()]
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
        $ChAssChestSymmetry = ChAssChestSymmetry::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Simetria de torax obtenido exitosamente',
            'data' => ['ch_ass_chest_symmetry' => $ChAssChestSymmetry]
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
        $ChAssChestSymmetry = ChAssChestSymmetry::find($id);  
        $ChAssChestSymmetry->name = $request->name; 
        $ChAssChestSymmetry->type_record_id = $request->type_record_id; 
        $ChAssChestSymmetry->ch_record_id = $request->ch_record_id;         
        $ChAssChestSymmetry->save();

        return response()->json([
            'status' => true,
            'message' => 'Simetria de torax actualizado exitosamente',
            'data' => ['ch_ass_chest_symmetry' => $ChAssChestSymmetry]
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
            $ChAssChestSymmetry = ChAssChestSymmetry::find($id);
            $ChAssChestSymmetry->delete();

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
