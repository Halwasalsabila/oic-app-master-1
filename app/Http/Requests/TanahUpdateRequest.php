<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TanahUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'inp_name'          => ['required', 'string'],
            'inp_pemakai'          => ['sometimes', 'string'],
            'inp_inv_card'      => ['sometimes', 'nullable', 'string'],
            'inp_project'       => ['required', 'exists:projects,id'],
            'inp_harga'         => ['sometimes', 'nullable', 'integer'],
            'inp_lokasi'        => ['required', 'string'],
            'inp_kondisi'       => ['required', 'in:Baik,Rusak'],
            'inp_tglpembelian'  => ['sometimes', 'nullable', 'date'],
            'inp_tglpeminjaman' => ['sometimes', 'nullable', 'date'],
        ];
    }
}
