<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $table = 'episodes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'slug', 'anime_id', 'description', 'video'
    ];

    public function anime(){
        return $this->belongsTo(Anime::class);
    }

}
