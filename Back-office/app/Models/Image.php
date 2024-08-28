<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function stop()
    {
        return $this->belongsTo(Stop::class);
    }
}

