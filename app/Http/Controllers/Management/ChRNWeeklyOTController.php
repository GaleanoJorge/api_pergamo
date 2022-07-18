<?php

namespace App\Http\Controllers\Management;

use App\Models\ChRNWeeklyOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChRNWeeklyOTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChRNWeeklyOT = ChRNWeeklyOT::select();
        if($request->ch_record_id){
            $ChRNWeeklyOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id',3);
        }  


        if ($request->_sort) {
            $ChRNWeeklyOT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChRNWeeklyOT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChRNWeeklyOT = $ChRNWeeklyOT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChRNWeeklyOT = $ChRNWeeklyOT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_r_n_weekly_o_t' => $ChRNWeeklyOT]
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
        $ChRNWeeklyOT = ChRNWeeklyOT::where('ch_record_id', $id)->where('type_record_id', $type_record_id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_r_n_weekly_o_t' => $ChRNWeeklyOT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
    
        $ChRNWeeklyOT = new ChRNWeeklyOT;

        $ChRNWeeklyOT->check1_cognitive = $request-> check1_cognitive; 
        $ChRNWeeklyOT->check2_colors = $request-> check2_colors;
        $ChRNWeeklyOT->check3_elements = $request-> check3_elements; 
        $ChRNWeeklyOT->check4_balls = $request-> check4_balls; 
        $ChRNWeeklyOT->check5_material_paper = $request-> check5_material_paper;
        $ChRNWeeklyOT->check6_material_didactic = $request-> check6_material_didactic; 
        $ChRNWeeklyOT->check7_computer = $request-> check7_computer; 
        $ChRNWeeklyOT->check8_clay = $request-> check8_clay;
        $ChRNWeeklyOT->check9_colbon = $request-> check9_colbon; 
        $ChRNWeeklyOT->check10_pug = $request-> check10_pug; 

        $ChRNWeeklyOT->type_record_id = $request->type_record_id;
        $ChRNWeeklyOT->ch_record_id = $request->ch_record_id;
        $ChRNWeeklyOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_r_n_weekly_o_t' => $ChRNWeeklyOT->toArray()]
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
        $ChRNWeeklyOT = ChRNWeeklyOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_r_n_weekly_o_t' => $ChRNWeeklyOT]
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
        $ChRNWeeklyOT = ChRNWeeklyOT::find($id);
        
        $ChRNWeeklyOT->check1_cognitive = $request-> check1_cognitive; 
        $ChRNWeeklyOT->check2_colors = $request-> check2_colors;
        $ChRNWeeklyOT->check3_elements = $request-> check3_elements; 
        $ChRNWeeklyOT->check4_balls = $request-> check4_balls; 
        $ChRNWeeklyOT->check5_material_paper = $request-> check5_material_paper;
        $ChRNWeeklyOT->check6_material_didactic = $request-> check6_material_didactic; 
        $ChRNWeeklyOT->check7_computer = $request-> check7_computer; 
        $ChRNWeeklyOT->check8_clay = $request-> check8_clay;
        $ChRNWeeklyOT->check9_colbon = $request-> check9_colbon; 
        $ChRNWeeklyOT->check10_pug = $request-> check10_pug; 

        $ChRNWeeklyOT->type_record_id = $request->type_record_id;
        $ChRNWeeklyOT->ch_record_id = $request->ch_record_id;
        $ChRNWeeklyOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_r_n_weekly_o_t' => $ChRNWeeklyOT]
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
            $ChRNWeeklyOT = ChRNWeeklyOT::find($id);
            $ChRNWeeklyOT->delete();

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
