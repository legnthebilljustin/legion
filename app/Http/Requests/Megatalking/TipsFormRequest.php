<?php

namespace App\Http\Requests\Megatalking;

use Illuminate\Foundation\Http\FormRequest;

class TipsFormRequest extends FormRequest
{

    public function rules()
    {
        return [
            'content_id' => 'required|string',
            'text' => 'required|string'
        ];
    }
}
