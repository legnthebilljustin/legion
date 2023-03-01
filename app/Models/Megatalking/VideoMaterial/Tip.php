<?php

namespace App\Models\Megatalking\VideoMaterial;

use App\Models\Megatalking\Videomaterial\Content;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tip extends Model
{
    use HasFactory;

    public $guarded = [];

    public $hidden = [
        'created_at', 'updated_at'
    ];

    public function content() : BelongsTo {
        return $this->belongsTo(Content::class);
    }
}
