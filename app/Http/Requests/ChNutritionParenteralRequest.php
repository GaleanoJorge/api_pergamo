<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChNutritionParenteralRequest extends FormRequest
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
            // 'protein_contributions' => 'required',
            // 'carbohydrate_contribution' => 'required',
            // 'lipid_contribution' => 'required',
            // 'amino_acid_volume' => 'required',
            // 'ce_se' => 'required',
            // 'dextrose_volume' => 'required',
            // 'lipid_volume' => 'required',
            // 'total_grams_of_protein' => 'required',
            // 'grams_of_nitrogen' => 'required',
            // 'total_carbohydrates' => 'required',
            // 'total_grams_of_lipids' => 'required',
            // 'total_amino_acid_volume' => 'required',
            // 'total_dextrose_volume' => 'required',
            // 'total_lipid_volume' => 'required',
            // 'total_calories' => 'required',

        ];
    }
}
