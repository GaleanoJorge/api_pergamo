<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeAssetsRequest extends FormRequest
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
            //
            'name' => 'required',
            'fixed_assets_id'=> 'required',
            'plate_number' => 'required',
            
        ];
    }
}
