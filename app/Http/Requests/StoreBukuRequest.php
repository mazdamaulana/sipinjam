<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBukuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('buku')?->id;

        return [
            'isbn'           => ['required', 'string', Rule::unique('bukus', 'isbn')->ignore($id)],
            'judul'          => ['required', 'string', 'min:3', 'max:150'],
            'jumlah_halaman' => ['required', 'integer', 'min:1'],
            'penerbit'       => ['required', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'isbn.required'           => 'ISBN wajib diisi.',
            'isbn.unique'             => 'Nomor ISBN sudah terdaftar.',
            'judul.required'          => 'Judul buku wajib diisi.',
            'jumlah_halaman.min'      => 'Jumlah halaman minimal 1.',
            'penerbit.required'       => 'Penerbit wajib diisi.',
        ];
    }
}