<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Mews\Purifier\Facades\Purifier;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'author' => 'required',
            'name' => 'required',
            'body' => 'required',
            'image' => 'required'
        ]);

        $post = new Post;

        $post->author = request('author');
        $post->name = request('name');
        /* Security for WYSIWYG Editor */
        $post->body = Purifier::clean(request('body'));

        /* rename, resize and store images */
        $image = request()->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->resize(800, 400)->save($location);

        $post->image = $filename;

        $post->save();

        session()->flash('message', 'Post has been published.');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $post = Post::find($id);

        $this->validate(request(), [
            'author' => 'required',
            'name' => 'required',
            'body' => 'required'
        ]);

        $post->author = request('author');
        $post->name = request('name');

        /* Security for WYSIWYG Editor */
        $post->body = Purifier::clean(request('body'));

        /* overwrite image */
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $filename = $post->image;
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $post->image = $filename;
        }

        $post->save();

        session()->flash('message', 'Post have been successfully changed.');

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        session()->flash('message', 'Post have been deleted');

        return redirect('/');
    }
}
