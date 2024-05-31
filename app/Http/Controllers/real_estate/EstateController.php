<?php

namespace App\Http\Controllers\real_estate;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyImages;
use App\Models\User;
use App\Notifications\UserNotification;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Storage;

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
        if (Auth::user()->hasRole('agent')) {
            $data['property'] = Property::where('user_id', auth()->user()->id)->orderby('created_at', 'desc')->get();
            return view('real_estate.list', $data);
        } else {
            $data['property'] = Property::orderby('created_at', 'desc')->get();
            return view('admin.list', $data);

        }
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
            'promote_url' => 'required',
            'title' => 'required|string',
            'area' => 'required|string',
            'phone' => 'required|regex:/^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/',
            'price' => 'required|numeric',
            'beds' => 'required|numeric',
            'baths' => 'required|numeric',
            'garages' => 'required|numeric',
            'email' => 'required|email',
            'company_website' => 'required',
            'address' => 'required|string',
            'images' => 'required|array',
            'images.*' => 'image',
        ]);

        // dd($request->images);
        try {
            DB::beginTransaction();
            // Create a new property instance and fill it with the validated data
            $property = new Property();
            $property->promote_url = $validatedData['promote_url'];
            $property->garages = $validatedData['garages'];
            $property->baths = $validatedData['baths'];
            $property->beds = $validatedData['beds'];
            $property->area = $validatedData['area'];
            $property->title = $validatedData['title'];
            $property->phone = $validatedData['phone'];
            $property->price = $validatedData['price'];
            $property->email = $validatedData['email'];
            $property->company_website = $validatedData['company_website'];
            $property->address = $validatedData['address'];
            $property->user_id = auth()->user()->id;
            $property->save();

            if ($request->has('images') && !empty($request->images)) {
                foreach ($request->images as $key => $item) {
                    $imagePath = $item->store('public/images');
                    $storagePath = str_replace('public/', '', $imagePath);

                    // Assuming 'images' is the name of the hasMany relationship method
                    $property->images()->create(['image' => $storagePath]);
                }
            }




            $user = auth()->user();
            $notifyuser = User::role(['executive', 'admin'])
                ->get();

            // Send the notification to eligible users
            $message = "📢 Hey there! We have a new request waiting for your attention. Click here to check it out and take action.";
            \Notification::send($notifyuser, new UserNotification($user, $message, 'Real Estate'));

            DB::commit();

            return redirect()->back()->with('success', 'Property added successfully!');

        } catch (\Exception $e) {
            // Something went wrong, rollback the transaction
            DB::rollback();
            throw $e;
            return redirect()->back()->with('error', 'Something went wrong.');
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
            'promote_url' => 'required',
            'title' => 'required|string',
            'phone' => 'required|regex:/^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/',
            'price' => 'required|numeric',
            'beds' => 'required|numeric',
            'baths' => 'required|numeric',
            'area' => 'required|numeric',
            'garages' => 'required|numeric',
            'email' => 'required|email',
            'company_website' => 'required',
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
        $property->beds = $validatedData['beds'];
        $property->baths = $validatedData['baths'];
        $property->garages = $validatedData['garages'];
        $property->area = $validatedData['area'];
        $property->email = $validatedData['email'];
        $property->company_website = $validatedData['company_website'];
        $property->address = $validatedData['address'];
        $property->access = '';
        // Save the updated property
        $property->save();

        // Check if a new image is uploaded
        if ($request->has('images') && !empty($request->images)) {
            foreach ($request->images as $key => $item) {
                $imagePath = $item->store('public/images');
                $storagePath = str_replace('public/', '', $imagePath);

                // Assuming 'images' is the name of the hasMany relationship method
                $property->images()->create(['image' => $storagePath]);
            }
        }


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
    public function image($id)
    {
        $propertyImage = PropertyImages::findOrFail($id);

        // Delete the associated image file from storage
        Storage::delete('public/' . $propertyImage->image);

        // Delete the PropertyImages record
        $propertyImage->delete();
        return redirect()->back()->with('success', 'Property Image deleted successfully!');

    }
}
