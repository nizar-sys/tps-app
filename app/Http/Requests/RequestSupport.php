<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSupport extends FormRequest
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
            'nama_kepala_keluarga' => 'required',
            'no_telp' => 'required|numeric',
            'jenis_kelamin' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'potensi_suara' => 'required|numeric',
            'long_lat' => 'required|string|max:255',
            'foto_tampak_depan_rumah' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'nama_kepala_keluarga.required' => 'Nama Kepala Keluarga harus diisi',
            'no_telp.required' => 'No. Telp harus diisi',
            'no_telp.numeric' => 'No. Telp harus berupa angka',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'long_lat.required' => 'Long Lat harus diisi',
            'foto_tampak_depan_rumah.image' => 'Foto Tampak Depan Rumah harus berupa gambar',
            'foto_tampak_depan_rumah.mimes' => 'Foto Tampak Depan Rumah harus berupa gambar dengan format jpeg, png, jpg, gif, svg',
            'foto_tampak_depan_rumah.max' => 'Foto Tampak Depan Rumah maksimal 2048 KB',
            'potensi_suara.required' => 'Potensi Suara harus diisi',
            'potensi_suara.numeric' => 'Potensi Suara harus berupa angka',
        ];
    }
}
