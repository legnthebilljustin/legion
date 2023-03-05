<?php

namespace App\Http\Requests\Megatalking\Pagoda;

use Illuminate\Foundation\Http\FormRequest;

class UnitFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'course_id' => 'required|integer',
            'title' => 'required|string'
        ];
    }
}
