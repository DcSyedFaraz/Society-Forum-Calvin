<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Community;
use App\Models\User;
use App\Notifications\UserNotification;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Notification;

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
            // Notification
            $user = auth()->user();

            // Get the users except the authenticated user and those with the excluded roles
            $admin = User::role('admin')->get();

            // Send the notification to eligible users
            $message = "📢 New Post Added.";
            Notification::send($admin, new UserNotification($user, $message, 'Post'));
            
            return redirect()->back()->with('succes', 'Post created successfully.');
        } catch (\Exception $e) {
            // Something went wrong, rollback the transaction
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong.' . $e->getMessage());
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
    public function comment($id)
    {
        $community = Community::find($id);
        $community->load('comments.user');
        // dd($community);
        return view('community.comments', compact('community'));
    }
    public function commentStore(Request $request)
    {
        // dd($request->all());
        $Community = Community::find($request->community_id);
        $request->validate([
            'body' => 'required|string|max:100',
            'community_id' => 'required|exists:communities,id',
        ]);
        // dd($request->all(), $poll);

        // Create a new comment
        $comment = new Comment([
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);
        $Community->comments()->save($comment);

        // Notification
        $user = auth()->user();

        // Get the users except the authenticated user and those with the excluded roles
        $admin = User::role('admin')->get();

        // Send the notification to eligible users
        $message = "📢 New Comment Added.";
        Notification::send($admin, new UserNotification($user, $message, 'Comment'));

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
