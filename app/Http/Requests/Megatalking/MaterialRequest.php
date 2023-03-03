<?php

namespace App\Http\Requests\Megatalking;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string',
            'type' => 'required|string',
        ];
    }
}
