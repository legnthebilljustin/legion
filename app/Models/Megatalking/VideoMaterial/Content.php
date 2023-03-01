<?php

namespace App\Models\Megatalking\Videomaterial;

use App\Models\Megatalking\VideoMaterial\Tip;
use App\Models\Megatalking\VideoMaterial\Video;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Content extends Model
{
    use HasFactory;

    public $guarded = [];

    public $hidden = [
        'created_at', 'updated_at'
    ];

    public function video() : BelongsTo {
        return $this->belongsTo(Video::class);
    }

    public function tips() : HasMany {
        return $this->hasMany(Tip::class);
    }
}
