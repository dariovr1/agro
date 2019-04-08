<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplAddressStoreRequest extends FormRequest
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
            'nome' => 'required',
            'cognome' => 'required',
            'via' => 'required',
            'cap' => 'required',
            'comune' => 'required',
            'provincia' => 'required',
            'telefono' => 'digits_between:9,10|numeric'
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
            'nome.required' => 'il valore nome è richiesto',
            'cognome.required' => 'il valore cognome è richiesto',
            'via.required' => 'inserire una via',
            'cap.required' => 'Inserire un cap valido',
            'comune.required' => 'Inserire un comune',
            'provincia.required' => 'Inserire un provincia',
            'telefono.numeric' => 'il campo telefono può contenere solo numeri',
            'telefono.max' => 'formato telefono non corretto o superato'
        ];
    }


}
