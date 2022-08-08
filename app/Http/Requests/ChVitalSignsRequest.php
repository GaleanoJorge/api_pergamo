<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChVitalSignsRequest extends FormRequest
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
            'clock',
            'cardiac_frequency',
            'respiratory_frequency',
            'temperature',
            'oxigen_saturation',
            'intracranial_pressure',
            'cerebral_perfusion_pressure',
            'intra_abdominal',
            'pressure_systolic',
            'pressure_diastolic',
            'pressure_half',
            'pulse',
            'venous_pressure',
            'size',
            'weight',
            'glucometry',
            'body_mass_index', //i.m.c
            'pulmonary_systolic',
            'pulmonary_diastolic',
            'pulmonary_half',
            'head_circunference',
            'abdominal_perimeter',
            'chest_perimeter',
            'right_reaction',
            'pupil_size_right',
            'left_reaction',
            'pupil_size_left',
            'has_oxigen',
            'ch_vital_hydration_id',
            'ch_vital_ventilated_id',
            'ch_vital_temperature_id',
            'ch_vital_neurological_id',
            'type_record_id',
            'ch_record_id',
        ];
    }
}
