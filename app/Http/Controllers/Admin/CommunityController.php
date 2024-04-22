<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Community;
use App\Models\User;
use App\Notifications\CommentNotification;
use App\Notifications\UserNotification;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Notification;
use Storage;
use Str;

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

            return redirect()->back()->with('success', 'Post created successfully.');
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
        // dd($request->all(), $community);
        $request->validate([
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming maximum file size is 2MB
        ]);

        $community->description = $request->description;

        if ($request->hasFile('image')) {
            if ($community->image) {
                Storage::delete('public/' . $community->image); // Delete image from storage
            }

            // Store the new image
            $imagePath = $request->file('image')->store('public/images');
            $storagePath = str_replace('public/', '', $imagePath);
            $community->image = $storagePath;
        }

        $community->save();

        return redirect()->back()->with('success', 'Community post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        // dd($community);
        if (Auth::user()->hasRole('admin') || Auth::id() == $community->user_id) {
            if ($community->image) {
                Storage::delete('public/' . $community->image); // Delete image from storage
            }
            $community->delete();
        } else {
            return redirect()->back()->with('error', 'You do not have permission to delete it.');
        }
        return redirect()->back()->with('success', 'Post Deleted Successfully.');
    }
    public function commentDEL($id)
    {
        // dd($community);
        $comment = Comment::find($id);
        if (Auth::user()->hasRole('admin') || Auth::id() == $comment->user_id) {
            $comment->delete();
        } else {
            return redirect()->back()->with('error', 'You do not have permission to delete it.');
        }
        return redirect()->back()->with('success', 'Comment Deleted Successfully.');
    }
    public function comment($id)
    {
        Community::findOrFail($id);
        $comments = Comment::where('community_id', $id)->with('user')->orderByDesc('created_at')->get();
        $users = User::pluck('username')->toArray();
        // dd($users);
        return view('community.comments', compact('comments', 'id', 'users'));
    }
    public function storeReply(Request $request, $commentId)
    {
        $request->validate([
            'reply' => 'required|string|max:100',
            'community_id' => 'required|exists:communities,id',
        ]);
        $taggedUsernames = json_decode($request->input('taggedUsernames'));
        // dd($taggedUsernames);
        $user = auth()->user()->name;
        $url = route('community.comments', $request->input('community_id'));

        foreach ($taggedUsernames as $key => $value) {

            $notifyuser = User::where('username', $value)->first();

            // Send the notification to eligible users
            $message = "📢 Hey there! {$user} mentioned you in the comment.";
            \Notification::send($notifyuser, new CommentNotification($url, $message, 'Reply'));
        }

        $comment = Comment::findOrFail($commentId);

        $reply = new Comment();
        $reply->body = $request->input('reply');
        $reply->parent_id = $comment->id;
        $reply->user_id = auth()->id();
        $reply->save();

        $notify = User::find($comment->user_id);
        $messages = "📢 Hey there! {$user} replied to your comment.";
        \Notification::send($notify, new CommentNotification($url, $messages, 'Mention'));

        return redirect()->back()->with('success', 'Reply added successfully.');
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

        $taggedUsernames = json_decode($request->input('taggedUsernames'));
        // dd($taggedUsernames);
        foreach ($taggedUsernames as $key => $value) {
            $notifyuser = User::where('username', $value)->first();
            $user = auth()->user()->name;
            $url = route('community.comments', $request->input('community_id'));
            // Send the notification to eligible users
            $message = "📢 Hey there! {$user} mentioned you in the comment.";
            \Notification::send($notifyuser, new CommentNotification($url, $message, 'Mention'));
        }

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
