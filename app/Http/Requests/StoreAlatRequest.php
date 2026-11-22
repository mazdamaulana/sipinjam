<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAlatRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('alat')?->id;

        return [
            'kode'    => ['required', 'string', 'max:20', Rule::unique('alats', 'kode')->ignore($id)],
            'nama'    => ['required', 'string', 'max:100'],
            'stok'    => ['required', 'integer', 'min:0'],
            'kondisi' => ['required', 'in:baik,rusak ringan,rusak berat'],
        ];
    }

    public function messages(): array
    {
        return [
            'kode.required' => 'Kode alat wajib diisi.',
            'kode.unique'   => 'Kode alat sudah dipakai.',
            'stok.min'      => 'Stok tidak boleh negatif.',
        ];
    }
}