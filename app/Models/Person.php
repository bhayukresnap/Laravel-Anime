<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table = 'people';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'name', 'given_name', 'website', 'birthday', 'family_name', 'description', 'photo', 'thumbnail', 'slug'
    ];

    public function meta(){
        return $this->morphOne(Meta::class, 'metaable');
    }
    
}
