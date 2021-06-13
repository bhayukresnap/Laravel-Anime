<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\cms\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Validator;
use App\Models\Person;
use Carbon\Carbon;
class PersonController extends Controller
{

    public function index(Request $request)
    {   
        return view('cms.people.index', ['people' => $this->filter(new Person, $request)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.people.create');
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
            'slug' => 'required|string|unique:metas',
            'given_name' => 'nullable|string|max:255',
            'family_name' => 'nullable|string|max:255',
            'birthday' => 'nullable|string|date',
            'website'=> 'nullable|string|max:255',
            'description' => 'nullable|string',
        ],
        [
            'photo.required' => 'Image cannot empty!',
            'name.required' => 'Name cannot empty!',
            'slug.unique' => 'Slug is already exist!',
        ]
    );

        if($validate->passes()){
            $person = new Person;
            $person->photo = $request->photo;
            $person->thumbnail = $request->thumbnail;
            $person->name = $request->name;
            $person->given_name = $request->given_name;
            $person->family_name = $request->family_name;
            $person->birthday = Carbon::parse($request->birthday)->format('d M Y');
            $person->website = $request->website;
            $person->description = $request->description;
            return $person->save() && $this->addMeta($person, $request) 
            ? $this->ApiResponse('Data has been added successfully!') 
            : $this->ApiResponse('Something went wrong!', 406);
        }else{
            return $this->ApiResponse($validate->errors()->all(), 406);
        }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        return view('cms.people.edit', ['person'=> $person]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {

        $validate = Validator::make($request->all(), [
                'photo' => 'required|string',
                'name' => 'required|string|max:255',
                'slug' => ['required', 'string', Rule::unique('metas')->ignore($person->meta->id)],
                'given_name' => 'nullable|string|max:255',
                'family_name' => 'nullable|string|max:255',
                'birthday' => 'nullable|string|date',
                'website'=> 'nullable|string|max:255',
                'description' => 'nullable|string',
            ],
            [
                'photo.required' => 'Image cannot empty!',
                'name.required' => 'Name cannot empty!',
                'slug.unique' => 'Slug is already exist!',
            ]
        );
        if($validate->passes()){
            $person->photo = $request->photo;
            $person->thumbnail = $request->thumbnail;
            $person->name = $request->name;
            $person->given_name = $request->given_name;
            $person->family_name = $request->family_name;
            $person->birthday = Carbon::parse($request->birthday)->format('d M Y');
            $person->website = $request->website;
            $person->description = $request->description;
            return $person->save() && $this->updateMeta($person, $request) 
            ? $this->ApiResponse('Data has been updated successfully!') 
            : $this->ApiResponse('Something went wrong!', 406);
        }else{
            return $this->ApiResponse($validate->errors()->all(), 406);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {   
        return $person->delete() && $person->meta()->delete() ? redirect()->back() : '';
        //return $person->delete() ? $this->ApiResponse($person->name.' has been removed') : $this->ApiResponse('Something went wrong!', 406);
    }
}
