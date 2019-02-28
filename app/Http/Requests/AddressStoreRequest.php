<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressStoreRequest extends FormRequest
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
            'nominativo' => 'required',
            'via' => 'required',
            'cap' => 'required',
            'comune' => 'required',
            'provincia' => 'required'
        ];
    }

      /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nominativo.required' => 'Inserire un nominativo valido',
            'via.required' => 'inserire una via',
            'cap.required' => 'Inserire un cap valido',
            'comune.required' => 'Inserire un comune',
            'provincia.required' => 'Inserire un provincia'
        ];
    }


}
