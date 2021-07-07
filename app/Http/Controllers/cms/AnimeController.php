<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\cms\Controller;
use App\Models\Anime;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Validator;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('cms.animes.index', ['animes' => $this->filter(new Anime, $request)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.animes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'photo' => 'required|string',
            'name' => 'required|unique:animes|string',
            'slug' => 'required|unique:metas',
            'english' => 'nullable|string',
            'synonyms' => 'nullable|string',
            'japanese' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
            'type' => 'nullable|string',
            'aired_from' => 'nullable|date|string',
            'aired_to' => 'nullable|date|string',
            'studio_id' => 'nullable|number',
            'source_id' => 'nullable|number',
            'season_id' => 'nullable|number',
            'genre.*' => 'nullable|number',
            'producer.*' => 'nullable|number',
            'licensor.*' => 'nullable|number',
            'staff.*' => 'nullable|number',
            'character' => 'nullable|number',
        ],
    );
        if($validate->passes()){
            $anime = new Anime;
            $anime->name = $request->name;
            $anime->photo = $request->photo;
            $anime->thumbnail = $request->thumbnail;
            $anime->english = $request->english;
            $anime->synonyms = $request->synonyms;
            $anime->japanese = $request->japanese;
            $anime->status = $request->status;
            $anime->type = $request->type;
            $anime->aired_from = $request->aired_from;
            $anime->aired_to = $request->aired_to;
            $anime->studio_id = $request->studio;
            $anime->source_id = $request->source;
            $anime->season_id = $request->season;
            $anime->description = $request->description;
            return $anime->save()
            && $this->addMeta($anime, $request)
            && $anime->genres()->sync($request->genres)
            && $anime->producers()->sync($request->producers)
            && $anime->licensors()->sync($request->licensors)
            && $anime->staffs()->sync($request->staffs)
            && $anime->characters()->sync($request->characters)
            ? $this->ApiResponse('Data has been added successfully!')
            : $this->ApiResponse('Something went wrong', 406);

        }else{
            return $this->ApiResponse($validate->errors()->all(), 406);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function show(Anime $anime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function edit(Anime $anime)
    {
        return view('cms.animes.edit', ['anime' => $anime]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anime $anime)
    {

        $validate = Validator::make($request->all(), [
            'photo' => 'required|string',
            'name' => ['required', 'string', Rule::unique('animes')->ignore($anime->id)],
            'slug' => ['required', 'string', Rule::unique('metas')->ignore($anime->meta->id)],
            'english' => 'nullable|string',
            'synonyms' => 'nullable|string',
            'japanese' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
            'type' => 'nullable|string',
            'aired_from' => 'nullable|date|string',
            'aired_to' => 'nullable|date|string',
            'studio_id' => 'nullable|number',
            'source_id' => 'nullable|number',
            'season_id' => 'nullable|number',
            'genre.*' => 'nullable|number',
            'producer.*' => 'nullable|number',
            'licensor.*' => 'nullable|number',
            'staff.*' => 'nullable|number',
            'character' => 'nullable|number',
        ],
    );

        if($validate->passes()){
            $anime->name = $request->name;
            $anime->photo = $request->photo;
            $anime->thumbnail = $request->thumbnail;
            $anime->english = $request->english;
            $anime->synonyms = $request->synonyms;
            $anime->japanese = $request->japanese;
            $anime->status = $request->status;
            $anime->type = $request->type;
            $anime->aired_from = $request->aired_from;
            $anime->aired_to = $request->aired_to;
            $anime->studio_id = $request->studio;
            $anime->source_id = $request->source;
            $anime->season_id = $request->season;
            $anime->description = $request->description;
            return $anime->save()
            && $this->updateMeta($anime, $request)
            && $anime->genres()->sync($request->genres)
            && $anime->producers()->sync($request->producers)
            && $anime->licensors()->sync($request->licensors)
            && $anime->staffs()->sync($request->staffs)
            && $anime->characters()->sync($request->characters)
            ? $this->ApiResponse('Data has been added successfully!')
            : $this->ApiResponse('Something went wrong', 406);
        }else{
            return $this->ApiResponse($validate->errors()->all(), 406);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anime $anime)
    {
        return $anime->delete() && $anime->meta()->delete() ? redirect()->back() : '';
    }
}
