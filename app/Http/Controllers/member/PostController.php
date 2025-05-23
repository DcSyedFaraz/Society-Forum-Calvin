<?php

namespace App\Http\Controllers\member;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $blogs = Post::where('type',0)->get();
        return view('member.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('member.blogs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'type' => 'required',
            'user_id' => 'required',
        ]);

        Post::create($validatedData);

        return redirect('/member/blogs')->with('success', 'Blog created successfully.');
    }

    public function show(Post $blog)
    {
        return view('member.blogs.show', compact('blog'));
    }

    public function edit(Post $blog)
    {
        return view('member.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Post $blog)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $blog->update($validatedData);
        return redirect('/member/blogs')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Post $blog)
    {
        $blog->delete();
        return redirect('/member/blogs')->with('success', 'Blog deleted successfully.');
    }
}
