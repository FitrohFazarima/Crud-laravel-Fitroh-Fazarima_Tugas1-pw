<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'txtnama'=>'required',
            'txtjenis'=>'required',
            'txtbrand'=>'required',
            'txtcc'=>'required|numeric',
            'txttahun'=>'required|numeric',
            'txtharga'=>'required|numeric',
        ];
    }
    public function messages():array
    {
        return[
            'txtnama.required'=>':attribute Tidak Boleh Kosong',
            'txtjenis.required'=>':attribute Tidak Boleh Kosong',
            'txtbrand.required'=>':attribute Tidak Boleh Kosong',
            'txtcc.required'=>':attribute Tidak Boleh Kosong',
            'txttahun.required'=>':attribute Tidak Boleh Kosong',
            'txtharga.required'=>':attribute Tidak Boleh Kosong'
        ];
    }

    public function attributes():array
    {
        return[
            'txtnama'=>'Nama',
            'txtjenis'=>'Jenis',
            'txtbrand'=>'Brand',
            'txtcc'=>'CC',
            'txtharga'=>'Harga',
            'txttahun'=>'Tahun',
            
        ];
    }
}
