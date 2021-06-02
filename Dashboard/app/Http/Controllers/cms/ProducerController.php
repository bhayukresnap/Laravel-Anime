<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\cms\Controller;
use Illuminate\Http\Request;
use App\Models\Producer;
use Illuminate\Validation\Rule;
use Validator;
class ProducerController extends Controller
{
    public function index(Request $request)
    {   
        return view('cms.producers.index', ['producers' => $this->filter(new Producer, $request)]);
    }

    public function create()
    {
        return view('cms.producers.create');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|unique:producers',
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
            $producer = new Producer;
            $producer->name = $request->name;
            $producer->description = $request->description;

            return $producer->save() && $this->addMeta($producer, $request) 
            ? $this->ApiResponse('Data has been added successfully!') 
            : $this->ApiResponse('Something went wrong!', 406);
            
        }else{
            return $this->ApiResponse($validate->errors()->all(), 406);
        }

    }

    public function show(Producer $producer)
    {
        //
    }

    public function edit(Producer $producer)
    {
        return view('cms.producers.edit', ['producer' => $producer]);
    }

    public function update(Request $request, Producer $producer)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string', Rule::unique('producers')->ignore($producer->id)],
            'description' => 'nullable|string',
            'slug' => ['required', Rule::unique('metas')->ignore($producer->meta->id)],
        ],
        [
            'name.required' =>  'Name is required!',
            'slug.required' =>  'Slug is required!',
            'slug.unique'   =>  'Slug is already Exists!',
        ]
    );
        if($validate->passes()){
            $producer->name = $request->name;
            $producer->description = $request->description;

            return $producer->save() && $this->updateMeta($producer, $request) 
            ? $this->ApiResponse('Data has been updated successfully!') 
            : $this->ApiResponse('Something went wrong!', 406);
            
        }else{
            return $this->ApiResponse($validate->errors()->all(), 406);
        }
    }

    public function destroy(Producer $producer)
    {
        return $producer->delete() && $producer->meta()->delete() ? redirect()->back() : '';
    }
}
