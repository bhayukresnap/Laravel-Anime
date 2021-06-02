<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;

    protected $table = 'metas';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'meta_title', 'meta_description', 'meta_keyword', 'noindex', 'canonical', 'json_ld', 'slug'
    ];

    public function metaable(){
    	return $this->morphTo();
    }


}
