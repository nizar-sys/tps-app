<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegion extends FormRequest
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
            'nama_wilayah' => 'required|string|max:255',
            'mentor_id' => 'required|exists:users,id',
            'operator_id' => 'required|exists:users,id',
            // 'status_wilayah' => 'required|string|max:255',
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
            'nama_wilayah.required' => 'Nama wilayah harus diisi.',
            'nama_wilayah.string' => 'Nama wilayah harus berupa string.',
            'nama_wilayah.max' => 'Nama wilayah maksimal 255 karakter.',
            'mentor_id.required' => 'Mentor harus diisi.',
            'mentor_id.exists' => 'Mentor tidak ditemukan.',
            'operator_id.required' => 'Operator harus diisi.',
            'operator_id.exists' => 'Operator tidak ditemukan.',
            'status_wilayah.required' => 'Status wilayah harus diisi.',
            'status_wilayah.string' => 'Status wilayah harus berupa string.',
            'status_wilayah.max' => 'Status wilayah maksimal 255 karakter.',
            'vote_2014.required' => 'Vote 2014 harus diisi.',
            'vote_2014.integer' => 'Vote 2014 harus berupa angka.',
            'vote_2019.required' => 'Vote 2019 harus diisi.',
            'vote_2019.integer' => 'Vote 2019 harus berupa angka.',
            'target_rumah.required' => 'Target rumah harus diisi.',
            'target_rumah.integer' => 'Target rumah harus berupa angka.',
            'progres.required' => 'Progres harus diisi.',
            'progres.integer' => 'Progres harus berupa angka.',
        ];
    }
}
