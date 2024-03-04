<?php

namespace App\Http\Controllers\real_estate;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('real_estate.register');
    }
    public function list()
    {
        $data['property'] = Property::orderby('created_at','desc')->get();
        return view('real_estate.list',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function listSave(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'promote_url' => 'required|url',
            'price' => 'required|numeric',
            'email' => 'required|email',
            'company_website' => 'required|url',
            'address' => 'required|string',
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('public/images');
        $storagePath = str_replace('public/', '', $imagePath);

        // Create a new property instance and fill it with the validated data
        $property = new Property();
        $property->promote_url = $validatedData['promote_url'];
        $property->price = $validatedData['price'];
        $property->email = $validatedData['email'];
        $property->company_website = $validatedData['company_website'];
        $property->address = $validatedData['address'];
        $property->image = $storagePath;
        $property->user_id = auth()->user()->id;


        $property->save();
        return redirect()->back()->with('success','Property added successfully!');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
