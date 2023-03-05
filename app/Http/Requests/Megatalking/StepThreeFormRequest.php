<?php

namespace App\Http\Requests\Megatalking;

use Illuminate\Foundation\Http\FormRequest;

class StepThreeFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'unit_video_material_id' => 'required|integer',
            'type' => 'required|string|max:10',
            'data' => 'required|string'
        ];
    }
}
