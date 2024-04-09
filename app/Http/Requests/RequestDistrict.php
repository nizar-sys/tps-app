<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestDistrict extends FormRequest
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
            'nama_kecamatan' => 'required',
            'region_id' => 'required|exists:regions,id',
            'mentor_id' => 'required|exists:users,id',
            // 'status_kecamatan' => 'required|string',
            // 'vote_2014' => 'required|integer',
            // 'vote_2019' => 'required|integer',
            // 'target_rumah' => 'required|integer',
            // 'progres' => 'required|integer',
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
            'nama_kecamatan.required' => 'Nama Kecamatan harus diisi',
            'region_id.required' => 'Region harus diisi',
            'region_id.exists' => 'Region tidak ditemukan',
            'mentor_id.required' => 'Mentor harus diisi',
            'mentor_id.exists' => 'Mentor tidak ditemukan',
            // 'status_kecamatan.required' => 'Status Kecamatan harus diisi',
            // 'status_kecamatan.string' => 'Status Kecamatan harus berupa string',
            // 'vote_2014.required' => 'Vote 2014 harus diisi',
            // 'vote_2014.integer' => 'Vote 2014 harus berupa integer',
            // 'vote_2019.required' => 'Vote 2019 harus diisi',
            // 'vote_2019.integer' => 'Vote 2019 harus berupa integer',
            // 'target_rumah.required' => 'Target Rumah harus diisi',
            // 'target_rumah.integer' => 'Target Rumah harus berupa integer',
            // 'progres.required' => 'Progres harus diisi',
            // 'progres.integer' => 'Progres harus berupa integer',
        ];
    }
}
