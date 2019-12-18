<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $tags = Tag::all();
        $categories = Category::all();
        return view('posts.create', compact('categories', 'tags', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Auth::user()->posts()->create($this->validateRequest());
        $this->storeImage($post);

        $post->tags()->sync($request->tags, false);
        return redirect(route('posts.index'))->with('status', 'Post has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('posts.edit', compact('categories', 'tags', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post = Auth::user()->posts()->update($this->validateRequest());
        $this->storeImage($post);

        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync(array());
        }

        return redirect(route('posts.index'))->with('status', 'The post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach();
        Storage::delete($post->image);
        $post->delete();

        return back()->with('status', 'The post was successfully deleted!');
    }

    private function validateRequest()
    {
        $validateData = request()->validate([
            'title' => 'required|min:3',
            'content' => 'required|min:3',
            'category_id' => 'required',
            'image' => 'required|image|file|max:3000',
        ]);

        $validateData['slug'] = Str::slug($validateData['title']);

        return $validateData;
    }

    private function storeImage($post)
    {
        if (request()->has('image')) {
            $post->update([
                'image' => request()->image->store('uploads/posts'),
            ]);

            $image = Image::make(public_path('storage/' . $post->image))->fit(800, 550);
            $image->save();
        }
    }
}
