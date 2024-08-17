<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Mail::to('hm6280804@gmail.com')->send(new WelcomeMail(Auth::user()));
        $posts = Post::latest()->paginate(4);

        return view('posts.posts', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
    $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'nullable|file|max:6000|mimes:png,jpg,jpeg,webp'
        ]);

        $path = null;
        if($request->hasFile('image')){
           $path = Storage::disk('public')->put('posts_images', $request->image);
        }


        // Post::create(['user_id' => Auth::id(), ...$fields]);
        // create post
        Auth::user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path
        ]);
        // dd('ok');
        return redirect()->route('home')->with('success', 'your post is created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.viewPost', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('modify', $post);
        // dd('ok');
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Gate::authorize('modify', $post);

        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'nullable|max:6000|mimetypes:image/png,image/jpeg,image/jpg,image/webp' 
               ]);

        $path = $post->image ?? null;
        if($request->hasFile('image')){
            if($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
           $path = Storage::disk('public')->put('posts_images', $request->image);
        }

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path
        ]);

        return redirect()->route('posts.index')->with('success', 'your post was updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // dd('ok');
        Gate::authorize('modify', $post);
        if($post->image){
            storage::disk('public')->delete($post->image);
        }
        $post->delete();
        return redirect()->route('posts.index')->with('delete', 'post deleted successfully');
    }
}
