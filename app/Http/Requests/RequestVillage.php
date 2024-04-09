<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestVillage extends FormRequest
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
            'district_id' => 'required|numeric',
            'nama_desa' => 'required|string',
            'tim_id' => 'required|numeric',
            // 'status_desa' => 'required|string',
            // 'vote_2014' => 'required|numeric',
            // 'vote_2019' => 'required|numeric',
            // 'target_rumah' => 'required|numeric',
            // 'progres' => 'required|numeric',
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
            'district_id.required' => 'Kecamatan harus diisi.',
            'district_id.numeric' => 'Kecamatan harus berupa angka.',
            'nama_desa.required' => 'Nama desa harus diisi.',
            'nama_desa.string' => 'Nama desa harus berupa string.',
            'tim_id.required' => 'Tim harus diisi.',
            'tim_id.numeric' => 'Tim harus berupa angka.',
            // 'status_desa.required' => 'Status desa harus diisi.',
            // 'status_desa.string' => 'Status desa harus berupa string.',
            // 'vote_2014.required' => 'Vote 2014 harus diisi.',
            // 'vote_2014.numeric' => 'Vote 2014 harus berupa angka.',
            // 'vote_2019.required' => 'Vote 2019 harus diisi.',
            // 'vote_2019.numeric' => 'Vote 2019 harus berupa angka.',
            // 'target_rumah.required' => 'Target rumah harus diisi.',
            // 'target_rumah.numeric' => 'Target rumah harus berupa angka.',
            // 'progres.required' => 'Progres harus diisi.',
            // 'progres.numeric' => 'Progres harus berupa angka.',
        ];
    }
}
