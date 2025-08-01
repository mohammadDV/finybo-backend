<?php

namespace Domain\Address\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /** @use HasFactory<\Database\Factories\CityFactory> */
    use HasFactory;
    protected $guarded = [];


    public function province() {
        return $this->belongsTo(Province::class);
    }
}