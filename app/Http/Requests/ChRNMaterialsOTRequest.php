<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChRNMaterialsOTRequest extends FormRequest
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
            'check1_cognitive' => '',
            'check2_colors' => '',
            'check3_elements' => '',
            'check4_balls' => '',
            'check5_material_paper' => '',
            'check6_material_didactic' => '',
            'check7_computer' => '',
            'check8_clay' => '',
            'check9_colbon' => '',
            'check10_pug' => '',

            'type_record_id' => '',
            'ch_record_id' => ''
        ];
    }
}
