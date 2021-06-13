<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\main\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Anime;
class GenreController extends Controller
{
    public function genres(){
        return view('main.genre.index', ['genres' => Genre::all()]);
    }

    public function detail($slug){
        $genre = Genre::whereHas('meta', function($query) use ($slug) {
            $query->where('slug', $slug);
        })->firstOrFail();

        $animes = Anime::whereHas('genres', function($query) use ($genre){
            $query->where('genre_id', $genre->id);
        })->paginate($this->pagination);

        return view('main.genre.detail', ['genre' => $genre, 'animes' => $animes]);
    }

}
