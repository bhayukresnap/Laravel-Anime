<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    protected $table = 'animes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'english', 'synonyms', 'status', 'type', 'aired_from', 'aired_to', 'description', 'studio_id', 'source_id', 'season_id', 'photo', 'thumbnail'
    ];

    public function meta(){
        return $this->morphOne(Meta::class, 'metaable');
    }

    public function studio(){
        return $this->belongsTo(Studio::class);
    }

    public function source(){
        return $this->belongsTo(Source::class);
    }

    public function season(){
        return $this->belongsTo(Season::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);   
    }
    
    public function producers(){
        return $this->belongsToMany(Producer::class, 'anime_producer');
    }

    public function licensors(){
        return $this->belongsToMany(Licensor::class, 'anime_licensor');   
    }

    public function genres(){
        return $this->belongsToMany(Genre::class, 'anime_genre');   
    }

    public function characters(){
        return $this->belongsToMany(Character::class, 'anime_character');
    }

    public function staffs(){
        return $this->belongsToMany(Person::class, 'anime_staff');
    }

}
