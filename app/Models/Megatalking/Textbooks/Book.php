<?php

namespace App\Models\Megatalking\Textbooks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    public $guarded = [];

    public $hidden = [ 'created_at', 'updated_at' ];

    public function series() : BelongsTo {
        return $this->belongsTo(Series::class);
    }

    public function books() : HasMany {
        return $this->hasMany(Book::class);
    }
}
