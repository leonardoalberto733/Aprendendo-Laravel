<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#Tem os campos local que foi tirada, descrição, imagem e placeholder*
class Image extends Model
{
    use HasFactory;
    protected $fillable = ["news_id", "local","description", "placeholder", "image"];

    public function new()
    {
        return $this->belongsTo(News::class);
    }
}
