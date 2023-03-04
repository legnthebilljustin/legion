<?php

namespace App\Http\Requests\Megatalking;

use Illuminate\Foundation\Http\FormRequest;

class VideoFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'unit_video_material_id' => 'required|integer',
            'youtube_id' => 'required|string|unique:videos,youtube_id',
            'title' => 'required|string'
        ];
    }
}
