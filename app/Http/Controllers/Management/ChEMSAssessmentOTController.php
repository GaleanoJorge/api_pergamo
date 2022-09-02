<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEMSAssessmentOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChRecord;
use Illuminate\Database\QueryException;

class ChEMSAssessmentOTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEMSAssessmentOT = ChEMSAssessmentOT::select();

        if ($request->ch_record_id) {
            $ChEMSAssessmentOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->_sort) {
            $ChEMSAssessmentOT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChEMSAssessmentOT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChEMSAssessmentOT = $ChEMSAssessmentOT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChEMSAssessmentOT = $ChEMSAssessmentOT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_assessment_o_t' => $ChEMSAssessmentOT]
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $id, int $type_record_id): JsonResponse
    {
        $ChEMSAssessmentOT = ChEMSAssessmentOT::where('ch_record_id', $id)->where('type_record_id', $type_record_id)->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChEMSAssessmentOT = ChEMSAssessmentOT::select('ch_e_m_s_assessment_o_t.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_e_m_s_assessment_o_t.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_assessment_o_t' => $ChEMSAssessmentOT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        //$validate = ChEMSAssessmentOT::where('ch_record_id', $request->ch_record_id)->where('type_record_id', $request->type_record_id);

        //if (!$validate) {
            $ChEMSAssessmentOT = new ChEMSAssessmentOT;
            $ChEMSAssessmentOT->occupational_con = $request->occupational_con;
            $ChEMSAssessmentOT->check1_hold = $request->check1_hold;
            $ChEMSAssessmentOT->check2_improve = $request->check2_improve;
            $ChEMSAssessmentOT->check3_structure = $request->check3_structure;
            $ChEMSAssessmentOT->check4_promote = $request->check4_promote;
            $ChEMSAssessmentOT->check5_strengthen = $request->check5_strengthen;
            $ChEMSAssessmentOT->check6_promote_2 = $request->check6_promote_2;
            $ChEMSAssessmentOT->check7_develop = $request->check7_develop;
            $ChEMSAssessmentOT->check8_strengthen_2 = $request->check8_strengthen_2;
            $ChEMSAssessmentOT->check9_favor = $request->check9_favor;
            $ChEMSAssessmentOT->check10_functionality = $request->check10_functionality;

            $ChEMSAssessmentOT->type_record_id = $request->type_record_id;
            $ChEMSAssessmentOT->ch_record_id = $request->ch_record_id;
            $ChEMSAssessmentOT->save();

            return response()->json([
                'status' => true,
                'message' => 'Valoracion asociados al paciente exitosamente',
                'data' => ['ch_e_m_s_assessment_o_t' => $ChEMSAssessmentOT->toArray()]
            ]);
          
        // } else {
        //      return response()->json([
        //         'status' => false,
        //          'message' => 'Ya tiene observación'
        //     ], 423);
        //  }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChEMSAssessmentOT = ChEMSAssessmentOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_m_s_assessment_o_t' => $ChEMSAssessmentOT]
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
        $ChEMSAssessmentOT = ChEMSAssessmentOT::find($id);
        $ChEMSAssessmentOT->occupational_con = $request->occupational_con;
        $ChEMSAssessmentOT->check1_hold = $request->check1_hold;
        $ChEMSAssessmentOT->check2_improve = $request->check2_improve;
        $ChEMSAssessmentOT->check3_structure = $request->check3_structure;
        $ChEMSAssessmentOT->check4_promote = $request->check4_promote;
        $ChEMSAssessmentOT->check5_strengthen = $request->check5_strengthen;
        $ChEMSAssessmentOT->check6_promote_2 = $request->check6_promote_2;
        $ChEMSAssessmentOT->check7_develop = $request->check7_develop;
        $ChEMSAssessmentOT->check8_strengthen_2 = $request->check8_strengthen_2;
        $ChEMSAssessmentOT->check9_favor = $request->check9_favor;
        $ChEMSAssessmentOT->check10_functionality = $request->check10_functionality;

        $ChEMSAssessmentOT->type_record_id = $request->type_record_id;
        $ChEMSAssessmentOT->ch_record_id = $request->ch_record_id;
        $ChEMSAssessmentOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_m_s_assessment_o_t' => $ChEMSAssessmentOT]
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
            $ChEMSAssessmentOT = ChEMSAssessmentOT::find($id);
            $ChEMSAssessmentOT->delete();

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
