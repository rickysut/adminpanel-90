<?php

namespace App\Http\Requests;

use App\Models\Kecamatan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateKecamatanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kecamatan_edit');
    }

    public function rules()
    {
        return [
            'kd_kab_id' => [
                'required',
                'integer',
            ],
            'kd_kec' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:kecamatans,kd_kec,' . request()->route('kecamatan')->id,
            ],
            'nm_kec' => [
                'string',
                'required',
            ],
        ];
    }
}
