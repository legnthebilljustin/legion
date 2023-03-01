<?php

namespace App\Models\Persona;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
