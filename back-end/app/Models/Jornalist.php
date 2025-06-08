<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Jornalist extends Model
{
    use HasFactory;
    protected $fillable = ["name","email", "workPlace", "salary"];

    public function news(){
        return $this->belongsToMany(News::class);
    }
}
