<?php

namespace App\Http\Requests\Megatalking;

use Illuminate\Foundation\Http\FormRequest;

class ContentsFormRequest extends FormRequest
{

    public function rules()
    {
        return [
            'video_id' => 'required|integer',
            'type' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
            'sentence' => 'required|string',
            'translation' => 'required|string'
        ];
    }
}
