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
            'status',
            'cardiac_frequency' => 'required',
            'respiratory_frequency' => 'required',
            'temperature' => 'required',
            'oxigen_saturation' => 'required',
            'intracranial_pressure' => 'required',
            'cerebral_perfusion_pressure' => 'required',
            'intra_abdominal' => 'required',
            'pressure_systolic' => 'required',
            'pressure_diastolic' => 'required',
            'pressure_half' => 'required',
            'pulse' => 'required',
            'venous_pressure' => 'required',
            'size' => 'required',
            'weight' => 'required',
            'glucometry' => 'required',
            'body_mass_index' => 'required',
            'pulmonary_systolic' => 'required',
            'pulmonary_diastolic' => 'required',
            'pulmonary_half' => 'required',
            'head_circunference' => 'required',
            'abdominal_perimeter' => 'required',
            'chest_perimeter' => 'required',
            'fetal_heart_rate' => 'required',
            'right_reaction' => 'required',
            'pupil_size_right' => 'required',
            'left_reaction' => 'required',
            'pupil_size_left' => 'required',
            'glomerular_filtration_rate' => 'required',
            'cardiovascular_risk  ' => 'required',
            'vital_hydration_id' => 'required',
            'vital_ventilated_id' => 'required',
            'vital_temperature_id' => 'required',
            'vital_neurological_id' => 'required'
        ];
    }
}
