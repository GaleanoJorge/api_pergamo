<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChEDailyActivitiesOTRequest extends FormRequest
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
            'cook' => '',
            'kids' => '',
            'wash' => '',
            'game' => '',
            'ironing' => '',
            'walk' => '',
            'clean' => '',
            'sport' => '',
            'decorate' => '',
            'social' => '',
            'act_floristry' => '',
            'friends' => '',
            'read' => '',
            'politic' => '',
            'view_tv' => '',
            'religion' => '',
            'write' => '',
            'look' => '',
            'arrange' => '',
            'travel' => '',
            'observation_activity' => '',
            'test' => '',
            'observation_test' => '',

            'type_record_id' => '',
            'ch_record_id' => ''
        ];
    }
}
