<?php

namespace App\Http\Controllers\cms;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Traits\SlugTrait;
use App\Traits\FilterTrait;
use App\Traits\MetaTrait;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ResponseTrait, SlugTrait, FilterTrait, MetaTrait;

    protected $paginate = 10;
    // protected $table;
    // protected function page(Request $request){
    //     $people = $this->table;
    //     if(isset($request->search) && !empty($request->search)){
    //         return $people->where('name', 'LIKE', '%'.$request->search.'%')->orWhere('slug', 'LIKE', '%'.$request->search.'%')->paginate($this->paginate);
    //     }
    //     return response()->json($people->paginate($this->paginate));
    // }
}
