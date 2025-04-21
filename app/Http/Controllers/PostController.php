<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve posts for the currently authenticated user
        $posts = Post::where('user_id', Auth::id())->get();

        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');  // Show the create view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Create the post with the authenticated user's ID
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id(), // Add the user_id here
        ]);

        return redirect('/dashboard')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the post by ID
        $post = Post::findOrFail($id);

        // Return the view with the post data
        return view('show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $post = Post::findOrFail($id);


        return view('edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);


        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);


        return redirect('/dashboard')->with('success', 'Post edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $post = Post::findOrFail($id);
        $post->delete();


        return redirect('/')->with('success', 'Post deleted successfully!');
    }
}
