<?php

namespace App\Http\Requests\Megatalking;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'role' => 'required|string',
            'username' => 'required|min:8|max:16|unique:megatalking_users,username',
            'password' => 'required|min:8|max:16'
        ];
    }
}
