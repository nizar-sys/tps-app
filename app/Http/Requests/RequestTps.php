<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestTps extends FormRequest
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
            'village_id' => 'required',
            'nama_tps' => 'required',
            'tim_id' => 'required',
            // 'status_tps' => 'required',
            // 'vote_2014' => 'required',
            // 'vote_2019' => 'required',
            // 'target_rumah' => 'required',
            // 'progres' => 'required',
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
            'village_id.required' => 'Village is required!',
            'nama_tps.required' => 'Nama TPS is required!',
            'tim_id.required' => 'Tim is required!',
            // 'status_tps.required' => 'Status TPS is required!',
            // 'vote_2014.required' => 'Vote 2014 is required!',
            // 'vote_2019.required' => 'Vote 2019 is required!',
            // 'target_rumah.required' => 'Target Rumah is required!',
            // 'progres.required' => 'Progres is required!',
        ];
    }
}
