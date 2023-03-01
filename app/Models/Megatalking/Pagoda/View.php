<?php

namespace App\Models\Megatalking\Pagoda;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class View extends Model
{
    use HasFactory;

    public $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];


    public function unit() : BelongsTo {
        return $this->belongsTo(UnitPagoda::class);
    }
}
