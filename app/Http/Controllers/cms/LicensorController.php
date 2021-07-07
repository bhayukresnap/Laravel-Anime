<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\cms\Controller;
use App\Models\Licensor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class LicensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('cms.licensors.index', ['licensors' => $this->filter(new Licensor, $request)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.licensors.create');
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
            'name' => 'required|string|unique:licensors',
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
            $licensor = new Licensor;
            $licensor->name = $request->name;
            $licensor->description = $request->description;

            return $licensor->save() && $this->addMeta($licensor, $request) 
            ? $this->ApiResponse('Data has been added successfully!') 
            : $this->ApiResponse('Something went wrong!', 406);
            
        }else{
            return $this->ApiResponse($validate->errors()->all(), 406);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Licensor  $licensor
     * @return \Illuminate\Http\Response
     */
    public function show(Licensor $licensor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Licensor  $licensor
     * @return \Illuminate\Http\Response
     */
    public function edit(Licensor $licensor)
    {
        return view('cms.licensors.edit', ['licensor' => $licensor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Licensor  $licensor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Licensor $licensor)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string', Rule::unique('licensors')->ignore($licensor->id)],
            'description' => 'nullable|string',
            'slug' => ['required', Rule::unique('metas')->ignore($licensor->meta->id)],
        ],
        [
            'name.required' =>  'Name is required!',
            'slug.required' =>  'Slug is required!',
            'slug.unique'   =>  'Slug is already Exists!',
        ]
    );
        if($validate->passes()){
            $licensor->name = $request->name;
            $licensor->description = $request->description;

            return $licensor->save() && $this->updateMeta($licensor, $request) 
            ? $this->ApiResponse('Data has been updated successfully!') 
            : $this->ApiResponse('Something went wrong!', 406);
            
        }else{
            return $this->ApiResponse($validate->errors()->all(), 406);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Licensor  $licensor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Licensor $licensor)
    {
        return $licensor->delete() && $licensor->meta()->delete() ? redirect()->back() : '';
    }
}
