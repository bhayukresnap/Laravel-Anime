<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $table = 'seasons';
   	protected $primaryKey = 'id';
   	protected $fillable = [
   		'name', 'description'
   	];

   	public function meta(){
   		return $this->morphOne(Meta::class, 'metaable');
   	}

}
