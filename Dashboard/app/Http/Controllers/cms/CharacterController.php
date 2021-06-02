<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\cms\Controller;
use Illuminate\Validation\Rule;
use App\Models\Character;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use Validator;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('cms.characters.index', ['characters' => $this->filter(new Character, $request)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.characters.create');
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
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:character',
            'birthday' => 'nullable|string|date',
            'voice_actor'=> 'nullable|integer',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
        ],
        [
            'photo.required' => 'Image cannot empty!',
            'name.required' => 'Name cannot empty!',
            'slug.unique' => 'Slug is already exist!',
        ]
    );

        if($validate->passes()){
            $character = new Character;
            $character->photo = $request->photo;
            $character->thumbnail = $request->thumbnail;
            $character->name = $request->name;
            $character->birthday = Carbon::parse($request->birthday)->format('d M Y');
            $character->status = $request->status;
            $character->voice_actor_id = $request->voice_actor;
            $character->description = $request->description;
                
            return $character->save() && $this->addMeta($character, $request) 
            ? $this->ApiResponse('Data has been added successfully!') 
            : $this->ApiResponse('Something went wrong!', 406);

        }else{
            return $this->ApiResponse($validate->errors()->all(), 406);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function show(Character $character)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function edit(Character $character)
    {
        $person = \App\Models\People::where('id', $character->voice_actor_id)->first();
        return view('cms.characters.edit', ['character' => $character, 'voice_actor' => $person]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character $character)
    {
        $validate = Validator::make($request->all(), [
            'photo' => 'required|string',
            'name' => 'required|string|max:255',
            'slug' => ['required', 'string', Rule::unique('character')->ignore($character->id)],
            'birthday' => 'nullable|string|date',
            'voice_actor'=> 'nullable|integer',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
        ],
        [
            'photo.required' => 'Image cannot empty!',
            'name.required' => 'Name cannot empty!',
            'slug.unique' => 'Slug is already exist!',
        ]
    );

        if($validate->passes()){
            $character->photo = $request->photo;
            $character->thumbnail = $request->thumbnail;
            $character->name = $request->name;
            $character->birthday = Carbon::parse($request->birthday)->format('d M Y');
            $character->status = $request->status;
            $character->voice_actor_id = $request->voice_actor;
            $character->description = $request->description;
            return $character->save() && $this->updateMeta($character, $request) 
            ? $this->ApiResponse('Data has been updated successfully!') 
            : $this->ApiResponse('Something went wrong!', 406);
        }else{
            return $this->ApiResponse($validate->errors()->all(), 406);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        return $character->delete() ? redirect()->back() : null;
    }
}
