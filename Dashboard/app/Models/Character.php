<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $table = 'characters';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'name', 'birthday', 'description', 'photo', 'thumbnail', 'voice_actor_id'
    ];

    public function meta(){
        return $this->morphOne(Meta::class, 'metaable');
    }
    

}
