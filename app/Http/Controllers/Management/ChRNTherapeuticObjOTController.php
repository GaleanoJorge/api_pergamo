<?php

namespace App\Http\Controllers\Management;

use App\Models\ChRNTherapeuticObjOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChRNTherapeuticObjOTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChRNTherapeuticObjOT = ChRNTherapeuticObjOT::select();


        if ($request->_sort) {
            $ChRNTherapeuticObjOT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChRNTherapeuticObjOT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChRNTherapeuticObjOT = $ChRNTherapeuticObjOT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChRNTherapeuticObjOT = $ChRNTherapeuticObjOT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_r_n_therapeutic_obj_o_t' => $ChRNTherapeuticObjOT]
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
        $ChRNTherapeuticObjOT = ChRNTherapeuticObjOT::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->with('ch_e_m_s_assessment_o_t')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_r_n_therapeutic_obj_o_t' => $ChRNTherapeuticObjOT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $validate = ChRNTherapeuticObjOT::select('ch_r_n_therapeutic_obj_o_t.*')->where('ch_record_id', $request->ch_record_id)
        ->where('type_record_id', $request->type_record_id)
        ->get()->toArray();
         $validate=ChRNTherapeuticObjOT::where('ch_record_id', $request->ch_record_id)->where('ch_r_n_therapeutic_obj_o_t_id',$request->ch_r_n_therapeutic_obj_o_t)->first();
         if(!$validate){
        $ChRNTherapeuticObjOT = new ChRNTherapeuticObjOT;

        $ChRNTherapeuticObjOT->check1_hold = $request-> check1_hold; 
        $ChRNTherapeuticObjOT->check2_improve = $request-> check2_improve;
        $ChRNTherapeuticObjOT->check3_structure = $request-> check3_structure; 
        $ChRNTherapeuticObjOT->check4_promote = $request-> check4_promote; 
        $ChRNTherapeuticObjOT->check5_strengthen = $request-> check5_strengthen;
        $ChRNTherapeuticObjOT->check6_promote_2 = $request-> check6_promote_2; 
        $ChRNTherapeuticObjOT->check7_develop = $request-> check7_develop; 
        $ChRNTherapeuticObjOT->check8_strengthen_2 = $request-> check8_strengthen_2;
        $ChRNTherapeuticObjOT->check9_favor = $request-> check9_favor; 
        $ChRNTherapeuticObjOT->check10_functionality = $request-> check10_functionality; 

        $ChRNTherapeuticObjOT->type_record_id = $request->type_record_id;
        $ChRNTherapeuticObjOT->ch_record_id = $request->ch_record_id;
        $ChRNTherapeuticObjOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_r_n_therapeutic_obj_o_t' => $ChRNTherapeuticObjOT->toArray()]
        ]);
         }else{
             return response()->json([
                 'status' => false,
                 'message' => 'Ya tiene observación'
             ], 423);
         }


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChRNTherapeuticObjOT = ChRNTherapeuticObjOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_r_n_therapeutic_obj_o_t' => $ChRNTherapeuticObjOT]
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
        $ChRNTherapeuticObjOT = ChRNTherapeuticObjOT::find($id);
        
        $ChRNTherapeuticObjOT->check1_hold = $request-> check1_hold; 
        $ChRNTherapeuticObjOT->check2_improve = $request-> check2_improve;
        $ChRNTherapeuticObjOT->check3_structure = $request-> check3_structure; 
        $ChRNTherapeuticObjOT->check4_promote = $request-> check4_promote; 
        $ChRNTherapeuticObjOT->check5_strengthen = $request-> check5_strengthen;
        $ChRNTherapeuticObjOT->check6_promote_2 = $request-> check6_promote_2; 
        $ChRNTherapeuticObjOT->check7_develop = $request-> check7_develop; 
        $ChRNTherapeuticObjOT->check8_strengthen_2 = $request-> check8_strengthen_2;
        $ChRNTherapeuticObjOT->check9_favor = $request-> check9_favor; 
        $ChRNTherapeuticObjOT->check10_functionality = $request-> check10_functionality; 

        $ChRNTherapeuticObjOT->type_record_id = $request->type_record_id;
        $ChRNTherapeuticObjOT->ch_record_id = $request->ch_record_id;
        $ChRNTherapeuticObjOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_r_n_therapeutic_obj_o_t' => $ChRNTherapeuticObjOT]
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
            $ChRNTherapeuticObjOT = ChRNTherapeuticObjOT::find($id);
            $ChRNTherapeuticObjOT->delete();

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
