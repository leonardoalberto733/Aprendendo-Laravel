<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ["title", "date", "link", "description"];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function jornalists(){
        return $this->belongsToMany(Jornalist::class);
    }
}
