<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\cms\Controller;
use App\Models\Studio;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class StudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('cms.studios.index', ['studios' => $this->filter(new Studio, $request)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.studios.create');
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
            'name' => 'required|string|unique:studios',
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
            $studio = new Studio;
            $studio->name = $request->name;
            $studio->description = $request->description;

            return $studio->save() && $this->addMeta($studio, $request) 
            ? $this->ApiResponse('Data has been added successfully!') 
            : $this->ApiResponse('Something went wrong!', 406);
            
        }else{
            return $this->ApiResponse($validate->errors()->all(), 406);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Studios  $studio
     * @return \Illuminate\Http\Response
     */
    public function show(Studio $studio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Studios  $studio
     * @return \Illuminate\Http\Response
     */
    public function edit(Studio $studio)
    {
        return view('cms.studios.edit', ['studio' => $studio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Studios  $studio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Studio $studio)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string', Rule::unique('studios')->ignore($studio->id)],
            'description' => 'nullable|string',
            'slug' => ['required', Rule::unique('metas')->ignore($studio->meta->id)],
        ],
        [
            'name.required' =>  'Name is required!',
            'slug.required' =>  'Slug is required!',
            'slug.unique'   =>  'Slug is already Exists!',
        ]
    );
        if($validate->passes()){
            $studio->name = $request->name;
            $studio->description = $request->description;

            return $studio->save() && $this->updateMeta($studio, $request) 
            ? $this->ApiResponse('Data has been updated successfully!') 
            : $this->ApiResponse('Something went wrong!', 406);
            
        }else{
            return $this->ApiResponse($validate->errors()->all(), 406);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Studios  $studio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Studio $studio)
    {
        return $studio->delete() && $studio->meta()->delete() ? redirect()->back() : '';
    }
}
