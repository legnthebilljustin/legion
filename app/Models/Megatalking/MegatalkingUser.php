<?php

namespace App\Models\Megatalking;

use Database\Factories\Megatalking\UsersFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MegatalkingUser extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    public $guarded = [];

    protected $hidden = ['password', 'created_at', 'updated_at'];

    protected static function newFactory()
    {
        return UsersFactory::new();
    }
}
