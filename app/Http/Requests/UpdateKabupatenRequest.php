<?php

namespace App\Http\Requests;

use App\Models\Kabupaten;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateKabupatenRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kabupaten_edit');
    }

    public function rules()
    {
        return [
            'kd_prop_id' => [
                'required',
                'integer',
            ],
            'kd_kab' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:kabupatens,kd_kab,' . request()->route('kabupaten')->id,
            ],
            'nama_kab' => [
                'string',
                'required',
            ],
            'lat' => [
                'numeric',
            ],
            'lng' => [
                'numeric',
            ],
            'tz' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'path' => [
                'string',
                'nullable',
            ],
        ];
    }
}
