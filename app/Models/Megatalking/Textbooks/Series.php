<?php

namespace App\Models\Megatalking\Textbooks;

use App\Models\Megatalking\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Series extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    public $rules = [
        'course_id' => 'required|integer',
        'title' => 'required'
    ];

    public function course() :BelongsTo {
        return $this->belongsTo(Course::class);
    }

    public function books() : HasMany {
        return $this->hasMany(Book::class);
    }
}
