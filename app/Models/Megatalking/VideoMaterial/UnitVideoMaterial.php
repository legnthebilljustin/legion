<?php

namespace App\Models\Megatalking\VideoMaterial;

use App\Models\Megatalking\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UnitVideoMaterial extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    public $rules = [
        'course_id' => 'required|integer',
        'title' => 'required'
    ];

    public function course() : BelongsTo {
        return $this->belongsTo(Course::class);
    }

    public function video() : HasOne {
        return $this->hasOne(Video::class);
    }

    public function stepthree() : HasMany {
        return $this->hasMany(StepThree::class);
    }
}
