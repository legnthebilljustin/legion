<?php

namespace App\Models\Megatalking;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class MegatalkingUser extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    public $guarded = [];

    protected $hidden = ['password', 'created_at', 'updated_at'];
}
