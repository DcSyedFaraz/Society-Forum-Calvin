<?php

namespace App\Http\Controllers\real_estate;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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
        $data['property'] = Property::where('access', 'approved')->where('user_id', auth()->user()->id)->orderby('created_at', 'desc')->get();
        return view('real_estate.list', $data);
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
            'title' => 'required|string',
            'phone' => 'required|regex:/^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/',
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
        $property->title = $validatedData['title'];
        $property->phone = $validatedData['phone'];
        $property->price = $validatedData['price'];
        $property->email = $validatedData['email'];
        $property->company_website = $validatedData['company_website'];
        $property->address = $validatedData['address'];
        $property->image = $storagePath;
        $property->user_id = auth()->user()->id;


        $property->save();

        $user = auth()->user();
        $notifyuser = User::role(['executive', 'admin'])
            ->get();

        // Send the notification to eligible users
        $message = "📢 Hey there! We have a new request waiting for your attention. Click here to check it out and take action.";
        \Notification::send($notifyuser, new UserNotification($user, $message, 'Real Estate'));

        return redirect()->back()->with('success', 'Property added successfully!');
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
        // dd($id);
        $property = Property::findOrFail($id);
        return view('real_estate.listEdit', compact('property'));

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
        // Validate the request data
        $validatedData = $request->validate([
            'promote_url' => 'required|url',
            'title' => 'required|string',
            'phone' => 'required|regex:/^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/',
            'price' => 'required|numeric',
            'email' => 'required|email',
            'company_website' => 'required|url',
            'address' => 'required|string',
            'image' => 'nullable|image',
        ]);

        // Find the property to be updated
        $property = Property::findOrFail($id);

        // Update the property with the validated data
        $property->promote_url = $validatedData['promote_url'];
        $property->title = $validatedData['title'];
        $property->phone = $validatedData['phone'];
        $property->price = $validatedData['price'];
        $property->email = $validatedData['email'];
        $property->company_website = $validatedData['company_website'];
        $property->address = $validatedData['address'];
        $property->access = '';

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Store the new image
            $imagePath = $request->file('image')->store('public/images');
            $storagePath = str_replace('public/', '', $imagePath);
            $property->image = $storagePath;
        }

        // Save the updated property
        $property->save();

        $user = auth()->user();
        $notifyuser = User::role(['executive', 'admin'])
            ->get();

        // Send the notification to eligible users
        $message = "📢 Hey there! {$user->name} updated the property info.";
        \Notification::send($notifyuser, new UserNotification($user, $message, 'Real Estate'));

        return redirect()->route('agent.list')->with('success', 'Property updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Property::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Property deleted successfully!');

    }
}
