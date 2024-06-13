<?php

namespace App\Http\Controllers;

use App\Models\FloorPlan;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
use Validator;

class GalleryController extends Controller
{
    public function index()
    {
        $data['data'] = Gallery::orderBy('created_at', 'desc')->get();
        return view('admin.gallery_floorplan.gallery', $data);
    }
    public function floor_plans()
    {
        $data['data'] = FloorPlan::orderBy('created_at', 'desc')->get();
        return view('admin.gallery_floorplan.floor_plans', $data);
    }

    public function updateCaption(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:floor_plans,id',
            'caption' => 'required|string|max:255',
        ]);

        $floorPlan = FloorPlan::find($request->id);
        $floorPlan->caption = $request->caption;
        $floorPlan->save();

        return redirect()->back()->with('success', 'Caption updated successfully');
    }
    public function floor_plans_store(Request $request)
    {
        DB::beginTransaction();

        try {
            $validatedData = $request->validate([
                'caption' => 'nullable|string',
                'image' => 'required|image',
            ]);

            $floor = new FloorPlan();
            $floor->caption = $validatedData['caption'] ?? null;

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('floor_plans', 'public');
                $floor->path = $imagePath;
                $floor->name = $request->file('image')->getClientOriginalName();
            }

            $floor->save();

            DB::commit();

            return redirect()->back()->with('success', 'Floor plan saved successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
            return redirect()->back()->with('error', 'An error occurred while saving the floor plan.');
        }
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $rules = [
            'files.*' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];

        $messages = [
            'files.*.image' => 'Each file must be an image.',
            'files.*.mimes' => 'Each file must be a JPEG, PNG, JPG, or GIF image.',
            'files.*.max' => 'Each image may not be greater than 4mb.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();

        try {
            foreach ($request->file('files') as $file) {
                // dd($file);
                $path = $file->store('gallery', 'public');

                $originalName = $file->getClientOriginalName();

                $image = new Gallery([
                    'name' => $originalName,
                    'path' => $path,
                ]);
                $image->save();
            }

            DB::commit();

            return redirect()->back()->with('success', 'Images saved successfully.');

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->back()->with('error', 'An error occurred while saving the data.');
        }
    }
    public function destroy(Gallery $Gallery)
    {
        // dd($Gallery);
        if ($Gallery->path) {
            Storage::delete('public/' . $Gallery->path); // Delete image from storage
            $Gallery->delete();

            return redirect()->back()->with('success', 'Image Deleted Successfully.');
        } else {
            return redirect()->back()->with('error', 'No Image Found.');
        }
    }
    public function floor_plans_destroy(FloorPlan $plan)
    {
        // dd($plan);
        if ($plan->path) {
            Storage::delete('public/' . $plan->path); // Delete image from storage
            $plan->delete();

            return redirect()->back()->with('success', 'Floor Plan Deleted Successfully.');
        } else {
            return redirect()->back()->with('error', 'No Floor Plan Found.');
        }
    }
}
