<?php

namespace App\Models\Megatalking\Pagoda;

use App\Models\Megatalking\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnitPagoda extends Model
{
    use HasFactory;

    public function course() : BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function views() : HasMany
    {
        return $this->hasMany(View::class);
    }
}
