<?php

namespace App\Http\Controllers\Management;

use App\Models\ChGynecologists;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChRecord;
use Illuminate\Database\QueryException;

class ChGynecologistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChGynecologists = ChGynecologists::select();

        if ($request->_sort) {
            $ChGynecologists->orderBy($request->_sort, $request->_order);
        }

        if ($request->ch_record_id) {
            $ChGynecologists->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->search) {
            $ChGynecologists->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChGynecologists = $ChGynecologists->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChGynecologists = $ChGynecologists->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Antecedentes Ginecoobstetricos obtenidos exitosamente',
            'data' => ['ch_gynecologists' => $ChGynecologists]
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function getByRecord(Request $request,int $id, int $type_record_id): JsonResponse
    {

        $ChGynecologists = ChGynecologists::where('ch_record_id', $id)
        ->where('type_record_id', $type_record_id)
            ->with(
                'ch_type_gynecologists',
                'ch_planning_gynecologists',
                'ch_exam_gynecologists',
                'ch_flow_gynecologists',
                'ch_rst_cytology_gyneco',
                'ch_rst_biopsy_gyneco',
                'ch_rst_mammography_gyneco',
                'ch_rst_colposcipia_gyneco',
                'ch_failure_method_gyneco',
                'ch_method_planning_gyneco',
            )->get()->toArray();
            if ($request->has_input) { //
                if ($request->has_input == 'true') { //
                    $chrecord = ChRecord::find($id); //
                    $ChGynecologists = ChGynecologists::select('ch_gynecologists.*')
                        ->with(
                            'ch_type_gynecologists',
                            'ch_planning_gynecologists',
                            'ch_exam_gynecologists',
                            'ch_flow_gynecologists',
                            'ch_rst_cytology_gyneco',
                            'ch_rst_biopsy_gyneco',
                            'ch_rst_mammography_gyneco',
                            'ch_rst_colposcipia_gyneco',
                            'ch_failure_method_gyneco',
                            'ch_method_planning_gyneco',
                        )
                        ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                        ->where('ch_gynecologists.type_record_id', 1)
                        ->leftJoin('ch_record', 'ch_record.id', 'ch_gynecologists.ch_record_id') //
                        ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
                }
            }


        return response()->json([
            'status' => true,
            'message' => 'Antecedentes Ginecoobstetricos obtenidos exitosamente',
            'data' => ['ch_gynecologists' => $ChGynecologists]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChGynecologists = new ChGynecologists;
        $ChGynecologists->pregnancy_status = $request->pregnancy_status;
        $ChGynecologists->gestational_age = $request->gestational_age;
        $ChGynecologists->date_childbirth = $request->date_childbirth;
        $ChGynecologists->menarche_years = $request->menarche_years;
        $ChGynecologists->last_menstruation = $request->last_menstruation;
        $ChGynecologists->time_menstruation = $request->time_menstruation;
        $ChGynecologists->duration_menstruation = $request->duration_menstruation;
        $ChGynecologists->date_last_cytology = $request->date_last_cytology;
        $ChGynecologists->date_biopsy = $request->date_biopsy;
        $ChGynecologists->date_mammography = $request->date_mammography;
        $ChGynecologists->date_colposcipia = $request->date_colposcipia;
        $ChGynecologists->childbirth_number = $request->childbirth_number;
        $ChGynecologists->caesarean_operation = $request->caesarean_operation;
        $ChGynecologists->misbirth = $request->misbirth;
        $ChGynecologists->molar_pregnancy = $request->molar_pregnancy;
        $ChGynecologists->ectopic = $request->ectopic;
        $ChGynecologists->dead_sons = $request->dead_sons;
        $ChGynecologists->living_sons = $request->living_sons;
        $ChGynecologists->sons_dead_first_week = $request->sons_dead_first_week;
        $ChGynecologists->children_died_after_the_first_week = $request->children_died_after_the_first_week;
        $ChGynecologists->total_feats = $request->total_feats;
        $ChGynecologists->misbirth_unstudied = $request->misbirth_unstudied;
        $ChGynecologists->background_twins = $request->background_twins;
        $ChGynecologists->last_planned_pregnancy = $request->last_planned_pregnancy;
        $ChGynecologists->date_of_last_childbirth = $request->date_of_last_childbirth;
        $ChGynecologists->last_weight = $request->last_weight;
        $ChGynecologists->since_planning = $request->since_planning;
        $ChGynecologists->sexual_partners = $request->sexual_partners;
        $ChGynecologists->time_exam_breast_self = $request->time_exam_breast_self;
        $ChGynecologists->observation_breast_self_exam = $request->observation_breast_self_exam;
        $ChGynecologists->observation_flow = $request->observation_flow;
        $ChGynecologists->ch_type_gynecologists_id = $request->ch_type_gynecologists_id;
        $ChGynecologists->ch_planning_gynecologists_id = $request->ch_planning_gynecologists_id;
        $ChGynecologists->ch_flow_gynecologists_id = $request->ch_flow_gynecologists_id;
        $ChGynecologists->ch_exam_gynecologists_id = $request->ch_exam_gynecologists_id;
        $ChGynecologists->ch_rst_cytology_gyneco_id = $request->ch_rst_cytology_gyneco_id;
        $ChGynecologists->ch_rst_biopsy_gyneco_id = $request->ch_rst_biopsy_gyneco_id;
        $ChGynecologists->ch_rst_mammography_gyneco_id = $request->ch_rst_mammography_gyneco_id;
        $ChGynecologists->ch_rst_colposcipia_gyneco_id = $request->ch_rst_colposcipia_gyneco_id;
        $ChGynecologists->ch_failure_method_gyneco_id = $request->ch_failure_method_gyneco_id;
        $ChGynecologists->ch_method_planning_gyneco_id = $request->ch_method_planning_gyneco_id;
        $ChGynecologists->type_record_id = $request->type_record_id;
        $ChGynecologists->ch_record_id = $request->ch_record_id;
        $ChGynecologists->save();

        return response()->json([
            'status' => true,
            'message' => 'Antecedentes Ginecoobstetricos asociado al paciente exitosamente',
            'data' => ['ch_gynecologists' => $ChGynecologists->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChGynecologists = ChGynecologists::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Antecedentes Ginecoobstetricos obtenido exitosamente',
            'data' => ['ch_gynecologists' => $ChGynecologists]
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
        $ChGynecologists = ChGynecologists::find($id);
        $ChGynecologists->pregnancy_status = $request->pregnancy_status;
        $ChGynecologists->gestational_age = $request->gestational_age;
        $ChGynecologists->date_childbirth = $request->date_childbirth;
        $ChGynecologists->menarche_years = $request->menarche_years;
        $ChGynecologists->last_menstruation = $request->last_menstruation;
        $ChGynecologists->time_menstruation = $request->time_menstruation;
        $ChGynecologists->duration_menstruation = $request->duration_menstruation;
        $ChGynecologists->date_last_cytology = $request->date_last_cytology;
        $ChGynecologists->date_biopsy = $request->date_biopsy;
        $ChGynecologists->date_mammography = $request->date_mammography;
        $ChGynecologists->date_colposcipia = $request->date_colposcipia;
        $ChGynecologists->childbirth_number = $request->childbirth_number;
        $ChGynecologists->caesarean_operation = $request->caesarean_operation;
        $ChGynecologists->misbirth = $request->misbirth;
        $ChGynecologists->molar_pregnancy = $request->molar_pregnancy;
        $ChGynecologists->ectopic = $request->ectopic;
        $ChGynecologists->dead_sons = $request->dead_sons;
        $ChGynecologists->living_sons = $request->living_sons;
        $ChGynecologists->sons_dead_first_week = $request->sons_dead_first_week;
        $ChGynecologists->children_died_after_the_first_week = $request->children_died_after_the_first_week;
        $ChGynecologists->total_feats = $request->total_feats;
        $ChGynecologists->misbirth_unstudied = $request->misbirth_unstudied;
        $ChGynecologists->background_twins = $request->background_twins;
        $ChGynecologists->last_planned_pregnancy = $request->last_planned_pregnancy;
        $ChGynecologists->date_of_last_childbirth = $request->date_of_last_childbirth;
        $ChGynecologists->last_weight = $request->last_weight;
        $ChGynecologists->since_planning = $request->since_planning;
        $ChGynecologists->sexual_partners = $request->sexual_partners;
        $ChGynecologists->time_exam_breast_self = $request->time_exam_breast_self;
        $ChGynecologists->observation_breast_self_exam = $request->observation_breast_self_exam;
        $ChGynecologists->observation_flow = $request->observation_flow;
        $ChGynecologists->ch_type_gynecologists_id = $request->ch_type_gynecologists_id;
        $ChGynecologists->ch_planning_gynecologists_id = $request->ch_planning_gynecologists_id;
        $ChGynecologists->ch_flow_gynecologists_id = $request->ch_flow_gynecologists_id;
        $ChGynecologists->ch_exam_gynecologists_id = $request->ch_exam_gynecologists_id;
        $ChGynecologists->ch_rst_cytology_gyneco_id = $request->ch_rst_cytology_gyneco_id;
        $ChGynecologists->ch_rst_biopsy_gyneco_id = $request->ch_rst_biopsy_gyneco_id;
        $ChGynecologists->ch_rst_mammography_gyneco_id = $request->ch_rst_mammography_gyneco_id;
        $ChGynecologists->ch_rst_colposcipia_gyneco_id = $request->ch_rst_colposcipia_gyneco_id;
        $ChGynecologists->ch_failure_method_gyneco_id = $request->ch_failure_method_gyneco_id;
        $ChGynecologists->ch_method_planning_gyneco_id = $request->ch_method_planning_gyneco_id;
        $ChGynecologists->type_record_id = $request->type_record_id;
        $ChGynecologists->ch_record_id = $request->ch_record_id;
        $ChGynecologists->save();

        return response()->json([
            'status' => true,
            'message' => 'Antecedentes Ginecoobstetricos actualizado exitosamente',
            'data' => ['ch_gynecologists' => $ChGynecologists]
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
            $ChGynecologists = ChGynecologists::find($id);

            $ChGynecologists->delete();

            return response()->json([
                'status' => true,
                'message' => 'Antecedentes Ginecoobstetricos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Antecedentes Ginecoobstetricos en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
