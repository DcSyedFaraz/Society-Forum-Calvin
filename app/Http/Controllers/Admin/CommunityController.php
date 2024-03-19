<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Community;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['community'] = Community::orderByDesc('created_at')->get();
        return view('community.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'description' => 'required|string',
            'image' => 'image|max:2048',
        ];

        $messages = [
            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
            'image.image' => 'The file must be an image.',
            'image.max' => 'The image may not be greater than :max kilobytes.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $data = new Community();
            $data->description = $request->input('description');
            $data->user_id = Auth::id();

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/images');
                $storagePath = str_replace('public/', '', $imagePath);
                $data->image = $storagePath;
            }

            $data->save();
            DB::commit();
            return redirect()->back()->with('succes', 'Post created successfully.');
        } catch (\Exception $e) {
            // Something went wrong, rollback the transaction
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong.'.$e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function show(Community $community)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Community $community)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        //
    }
}
