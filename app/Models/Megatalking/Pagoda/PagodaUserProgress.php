<?php

namespace App\Models\Megatalking\Pagoda;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PagodaUserProgress extends Model
{
    use HasFactory;

    public $guarded = [];

    public $hidden = ['created_at', 'updated_at'];

    public function view() : BelongsTo
    {
        return $this->belongsTo(View::class);
    }
}
