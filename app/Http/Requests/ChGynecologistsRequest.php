<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChGynecologistsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => '',
            'pregnancy_status' => '',
            'gestational_age'  => '',
            'date_childbirth'  => '',
            'menarche_years'  => '',
            'last_menstruation'  => '',
            'time_menstruation'  => '',
            'duration_menstruation'  => '',
            'date_last_cytology'  => '',
            'date_biopsy'  => '',
            'date_mammography'  => '',
            'date_colposcipia'  => '',
            'childbirth_number'  => '',
            'caesarean_operation'  => '',
            'misbirth'  => '',
            'molar_pregnancy'  => '',
            'ectopic'  => '',
            'dead_sons'  => '',
            'living_sons'  => '',
            'sons_dead_first_week'  => '',
            'children_died_after_the_first_week'  => '',
            'total_feats'  => '',
            'misbirth_unstudied' => '',
            'background_twins' => '',
            'last_planned_pregnancy'  => '',
            'date_of_last_childbirth'  => '',
            'last_weight'  => '',
            'since_planning'  => '',
            'sexual_partners'  => '',
            'time_exam_breast_self'  => '',
            'observation_breast_self_exam'  => '',
            'observation_flow'  => '',
            'ch_type_gynecologists_id'  => '',
            'ch_planning_gynecologists_id'  => '',
            'ch_flow_gynecologists_id'  => '', 
            'ch_exam_gynecologists_id'  => '',
            'ch_result_cytology_id'  => '',
            'ch_result_biopsy_id'  => '',
            'ch_result_mammography_id'  => '',
            'ch_result_colposcipia_id'  => '',
            'ch_failure_method_id'  => '',
            'ch_method_planning_id' => '', 
            'type_record_id' => '',
            'ch_record_id'  => ''
        ];
    }
}
