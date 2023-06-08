<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
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
            'inp_inv_card'      => ['sometimes', 'nullable', 'string'],
            'inp_project'       => ['required', 'string'],
            'inp_lokasi'        => ['required', 'string'],
            'inp_harga'         => ['required_with:inp_tglpembelian'],
            'inp_deskripsi'     => ['sometimes', 'nullable', 'string'],
            'inp_pemakai'     => ['sometimes', 'nullable', 'string'],
            'inp_kondisi'       => ['required', 'in:Baik,Rusak,Dijual,Hilang'],
            'inp_tglpeminjaman' => ['sometimes', 'nullable', 'date'],
            'inp_tglpembelian' => ['sometimes', 'nullable', 'date'],
        ];
    }
}
