<?php

namespace App\Models\Megatalking;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MegatalkingUser extends Model
{
    use HasFactory;

    public $guarded = [];

    protected $hidden = ['password', 'created_at', 'updated_at'];
}
