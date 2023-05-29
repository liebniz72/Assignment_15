<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Retrieve all posts from the database
        $posts = Post::all();

        // Pass the posts to the view for displaying
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        // Display the form to create a new post
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            // Add more validation rules as needed
        ]);

        // Create a new post with the validated data
        Post::create($validatedData);

        // Redirect to the post index page with a success message
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function show($id)
    {
        // Find the post by its ID
        $post = Post::findOrFail($id);

        // Pass the post to the view for displaying
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        // Find the post by its ID
        $post = Post::findOrFail($id);

        // Display the form to edit the post
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            // Add more validation rules as needed
        ]);

        // Find the post by its ID
        $post = Post::findOrFail($id);

        // Update the post with the validated data
        $post->update($validatedData);

        // Redirect to the post index page with a success message
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        // Find the post by its ID
        $post = Post::findOrFail($id);

        // Delete the post
        $post->delete();

        // Redirect to the post index page with a success message
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
