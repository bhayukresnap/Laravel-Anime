<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\cms\Controller;
use Illuminate\Http\Request;
class SearchController extends Controller
{
    public function getPerson(Request $request){
        return $this->SearchResponse('people', $request);
    }

    public function getStudio(Request $request){
        return $this->SearchResponse('studios', $request);
    }

    public function getProducer(Request $request){
        return $this->SearchResponse('producers', $request);
    }

    public function getSeason(Request $request){
        return $this->SearchResponse('seasons', $request);
    }

    public function getSource(Request $request){
        return $this->SearchResponse('sources', $request);
    }

    public function getLicensor(Request $request){
        return $this->SearchResponse('licensors', $request);
    }

    public function getGenre(Request $request){
        return $this->SearchResponse('genres', $request);
    }

    public function getCharacter(Request $request){
        return $this->SearchResponse('characters', $request);
    }

    public function getAnime(Request $request){
        return $this->SearchResponse('animes', $request);
    }

}
