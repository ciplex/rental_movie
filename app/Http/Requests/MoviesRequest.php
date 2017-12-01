<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MoviesRequest extends FormRequest
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
        switch($this->method()) 
        {
            case "POST";
            return [
                'category_id' => 'required',
                'title' => 'required',
                'year' =>'required',
                'description' => 'required'
            ];
                break;
            case "PUT";
            return [
                'category_id' => 'required',
                'title' => 'required',
                'year' =>'required',
                'description' => 'required'
            ];
        }
    }

    // public function messages()
    // {
    //     return[
    //         'name.required' => 'Nama Harus diisi!',
    //         'address.required' => 'Alamat Harus diisi!',
    //         'age.required' => 'Umur Harus Diisi!',
    //         'email.required' => 'Email harus diisi' 
    //     ];
    // }
}