<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    use HasFactory;

    protected $fillable = [
        'day_id',
        'title',
        'description',
        'image',
        'food',
        'curiosities',
        'notes',
        'rating',
        'completed',
        'latitude',
        'longitude',
    ];

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
