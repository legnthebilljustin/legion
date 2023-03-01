<?php

namespace App\Models\Megatalking\VideoMaterial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    public $rules = [
        'unit_id' => 'required|integer',
        'youtube_id' => 'required|unique:videos',
        'title' => 'required'
    ];

    public function unit() : BelongsTo {
        return $this->belongsTo(UnitVideoMaterial::class);
    }
}
