<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\cms\Controller;
use App\Models\Episode;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('cms.episodes.index', ['episodes' => $this->filter(new Episode, $request, 'anime')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.episodes.create');
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
            'video' => 'required|string',
            'name' => ['required', 'string', Rule::unique('episodes')->where('anime_id', $request->anime)],
            'slug' => 'required',
            'anime' => 'required',
            'description' => 'nullable|string',
        ],
        [
            'name.unique' => 'This episode is already exist!',
        ]
    );
        if($validate->passes()){
            $episode = new Episode;
            $episode->name = $request->name;
            $episode->video = $request->video;
            $episode->slug = $request->slug;
            $episode->description = $request->description;
            $episode->anime_id = $request->anime;
            return $episode->save()
            ? $this->ApiResponse('Data has been added successfully!')
            : $this->ApiResponse('Something went wrong', 406);

        }else{
            return $this->ApiResponse($validate->errors()->all(), 406);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function show(Episode $episode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function edit(Episode $episode)
    {
        return view('cms.episodes.edit', ['episode' => $episode]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Episode $episode)
    {
        $validate = Validator::make($request->all(), [
            'video' => 'required|string',
            'name' => ['required', 'string', Rule::unique('episodes')->where('anime_id', $request->anime)->ignore($episode->id)],
            'slug' => 'required',
            'anime' => 'required',
            'description' => 'nullable|string',
        ],
        [
            'name.unique' => 'This episode is already exist!',
        ]
    );
        if($validate->passes()){
            $episode->name = $request->name;
            $episode->video = $request->video;
            $episode->slug = $request->slug;
            $episode->description = $request->description;
            $episode->anime_id = $request->anime;
            return $episode->save()
            ? $this->ApiResponse('Data has been updated successfully!')
            : $this->ApiResponse('Something went wrong', 406);

        }else{
            return $this->ApiResponse($validate->errors()->all(), 406);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episode $episode)
    {
        return $episode->delete() ? redirect()->back() : '';
    }
}
