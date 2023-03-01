<?php

namespace App\Models\Megatalking;

use App\Models\Megatalking\Pagoda\UnitPagoda;
use App\Models\Megatalking\Textbooks\Series;
use App\Models\Megatalking\VideoMaterial\UnitVideoMaterial;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    public $rules = [
        'title' => 'required',
        'type' => 'required'
    ];

    public function series() : HasMany {
        # for textbook series
        return $this->hasMany(Series::class);
    }

    public function units() : HasMany {
        # for video material units
        return $this->hasMany(UnitVideoMaterial::class);
    }

    public function pagoda() : HasMany
    {
        return $this->hasMany(UnitPagoda::class);
    }
}
