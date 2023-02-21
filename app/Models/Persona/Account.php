<?php

namespace App\Models\Persona;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $rules = [
        'type' => 'required',
        'name' => 'required',
        'username' => 'required',
        'password' => 'required'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'type',
        'user_id'
    ];
}
