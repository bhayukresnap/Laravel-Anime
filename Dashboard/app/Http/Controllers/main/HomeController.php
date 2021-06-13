<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\main\Controller;
use Illuminate\Http\Request;
use App\Models\Episode;

class HomeController extends Controller
{
    public function home(){
        $recently = Episode::orderBy('created_at', 'desc')->paginate($this->pagination);
        return view('main.index', ['recently' => $recently]);
    }
}
