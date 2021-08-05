<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilesDeliverySyncRequest extends FormRequest
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
            'mac' => 'required',
            'compress_file' => 'required',
            'state' => 'required',
            'id' => 'required|numeric',
            'userid' => 'required|numeric',
            'idActivity' => 'required|numeric',
        ];
    }
}
