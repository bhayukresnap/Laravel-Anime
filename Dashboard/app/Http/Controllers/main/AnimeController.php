<?php

namespace App\Http\Controllers\main;
use App\Models\Anime;
use App\Models\Episode;
use App\Http\Controllers\main\Controller;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function animes(){
        $animes = Anime::paginate($this->pagination);
        return view('main.anime.index', ['animes' => $animes]);
    }

    public function detail($slug){
        $anime = Anime::whereHas('meta', function($query) use ($slug) {
            $query->where('slug', $slug);
        })->firstOrFail();
        return view('main.anime.detail', ['anime' => $anime]);
    }
    
    public function episode($slug, $episode){
        $anime = Anime::whereHas('meta', function($query) use ($slug) {
            $query->where('slug', $slug);
        })->firstOrFail();

        $episode = Episode::where([
            ['slug', $episode],
            ['anime_id', $anime->id]
        ])->firstOrFail();

        return view('main.anime.episode', ['episode' => $episode]);

    }
}