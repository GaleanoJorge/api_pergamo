<?php

namespace App\Http\Controllers\Management;

use App\Models\ChRNMaterialsOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChRNMaterialsOTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChRNMaterialsOT = ChRNMaterialsOT::select();
        if($request->ch_record_id){
            $ChRNMaterialsOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id',3);
        }  


        if ($request->_sort) {
            $ChRNMaterialsOT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChRNMaterialsOT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChRNMaterialsOT = $ChRNMaterialsOT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChRNMaterialsOT = $ChRNMaterialsOT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_r_n_materials_o_t' => $ChRNMaterialsOT]
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id, int $type_record_id): JsonResponse
    {
        $ChRNMaterialsOT = ChRNMaterialsOT::where('ch_record_id', $id)->where('type_record_id', $type_record_id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_r_n_materials_o_t' => $ChRNMaterialsOT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
    
        $ChRNMaterialsOT = new ChRNMaterialsOT;

        $ChRNMaterialsOT->check1_cognitive = $request-> check1_cognitive; 
        $ChRNMaterialsOT->check2_colors = $request-> check2_colors;
        $ChRNMaterialsOT->check3_elements = $request-> check3_elements; 
        $ChRNMaterialsOT->check4_balls = $request-> check4_balls; 
        $ChRNMaterialsOT->check5_material_paper = $request-> check5_material_paper;
        $ChRNMaterialsOT->check6_material_didactic = $request-> check6_material_didactic; 
        $ChRNMaterialsOT->check7_computer = $request-> check7_computer; 
        $ChRNMaterialsOT->check8_clay = $request-> check8_clay;
        $ChRNMaterialsOT->check9_colbon = $request-> check9_colbon; 
        $ChRNMaterialsOT->check10_pug = $request-> check10_pug; 

        $ChRNMaterialsOT->type_record_id = $request->type_record_id;
        $ChRNMaterialsOT->ch_record_id = $request->ch_record_id;
        $ChRNMaterialsOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_r_n_materials_o_t' => $ChRNMaterialsOT->toArray()]
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
        $ChRNMaterialsOT = ChRNMaterialsOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_r_n_materials_o_t' => $ChRNMaterialsOT]
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
        $ChRNMaterialsOT = ChRNMaterialsOT::find($id);
        
        $ChRNMaterialsOT->check1_cognitive = $request-> check1_cognitive; 
        $ChRNMaterialsOT->check2_colors = $request-> check2_colors;
        $ChRNMaterialsOT->check3_elements = $request-> check3_elements; 
        $ChRNMaterialsOT->check4_balls = $request-> check4_balls; 
        $ChRNMaterialsOT->check5_material_paper = $request-> check5_material_paper;
        $ChRNMaterialsOT->check6_material_didactic = $request-> check6_material_didactic; 
        $ChRNMaterialsOT->check7_computer = $request-> check7_computer; 
        $ChRNMaterialsOT->check8_clay = $request-> check8_clay;
        $ChRNMaterialsOT->check9_colbon = $request-> check9_colbon; 
        $ChRNMaterialsOT->check10_pug = $request-> check10_pug; 

        $ChRNMaterialsOT->type_record_id = $request->type_record_id;
        $ChRNMaterialsOT->ch_record_id = $request->ch_record_id;
        $ChRNMaterialsOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_r_n_materials_o_t' => $ChRNMaterialsOT]
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
            $ChRNMaterialsOT = ChRNMaterialsOT::find($id);
            $ChRNMaterialsOT->delete();

            return response()->json([
                'status' => true,
                'message' => 'valoracion eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'valoracion en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
