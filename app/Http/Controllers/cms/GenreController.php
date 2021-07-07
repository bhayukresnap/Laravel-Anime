<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\cms\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class GenreController extends Controller
{

    public function index(Request $request)
    {   
        return view('cms.genres.index', ['genres' => $this->filter(new Genre, $request)]);
    }

    public function create()
    {
        return view('cms.genres.create');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|unique:genres',
            'description' => 'nullable|string',
            'slug' => 'required|unique:metas',
        ],
        [
            'name.required' =>  'Name is required!',
            'slug.required' =>  'Slug is required!',
            'slug.unique'   =>  'Slug is already Exists!',
        ]
    );

        if($validate->passes()){
            $genre = new Genre;
            $genre->name = $request->name;
            $genre->description = $request->description;

            return $genre->save() && $this->addMeta($genre, $request) 
            ? $this->ApiResponse('Data has been added successfully!') 
            : $this->ApiResponse('Something went wrong!', 406);
            
        }else{
            return $this->ApiResponse($validate->errors()->all(), 406);
        }

    }

    public function show(Genre $genre)
    {
        //
    }

    public function edit(Genre $genre)
    {
        return view('cms.genres.edit', ['genre' => $genre]);
    }

    public function update(Request $request, Genre $genre)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string', Rule::unique('genres')->ignore($genre->id)],
            'description' => 'nullable|string',
            'slug' => ['required', Rule::unique('metas')->ignore($genre->meta->id)],
        ],
        [
            'name.required' =>  'Name is required!',
            'slug.required' =>  'Slug is required!',
            'slug.unique'   =>  'Slug is already Exists!',
        ]
    );
        if($validate->passes()){
            $genre->name = $request->name;
            $genre->description = $request->description;

            return $genre->save() && $this->updateMeta($genre, $request) 
            ? $this->ApiResponse('Data has been updated successfully!') 
            : $this->ApiResponse('Something went wrong!', 406);
            
        }else{
            return $this->ApiResponse($validate->errors()->all(), 406);
        }
    }

    public function destroy(Genre $genre)
    {
        return $genre->delete() && $genre->meta()->delete() ? redirect()->back() : '';
    }
}
