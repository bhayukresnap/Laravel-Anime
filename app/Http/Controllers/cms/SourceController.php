<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\cms\Controller;
use App\Models\Source;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('cms.sources.index', ['sources' => $this->filter(new Source, $request)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.sources.create');
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
            'name' => 'required|string|unique:sources',
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
            $source = new Source;
            $source->name = $request->name;
            $source->description = $request->description;

            return $source->save() && $this->addMeta($source, $request) 
            ? $this->ApiResponse('Data has been added successfully!') 
            : $this->ApiResponse('Something went wrong!', 406);
            
        }else{
            return $this->ApiResponse($validate->errors()->all(), 406);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        return view('cms.sources.edit', ['source' => $source]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Source $source)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string', Rule::unique('sources')->ignore($source->id)],
            'description' => 'nullable|string',
            'slug' => ['required', Rule::unique('metas')->ignore($source->meta->id)],
        ],
        [
            'name.required' =>  'Name is required!',
            'slug.required' =>  'Slug is required!',
            'slug.unique'   =>  'Slug is already Exists!',
        ]
    );
        if($validate->passes()){
            $source->name = $request->name;
            $source->description = $request->description;

            return $source->save() && $this->updateMeta($source, $request) 
            ? $this->ApiResponse('Data has been updated successfully!') 
            : $this->ApiResponse('Something went wrong!', 406);
            
        }else{
            return $this->ApiResponse($validate->errors()->all(), 406);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        return $source->delete() && $source->meta()->delete() ? redirect()->back() : '';
    }
}
