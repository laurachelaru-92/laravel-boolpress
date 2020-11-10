<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Article::all();

        return view('admin.index', compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'title' => 'required|max:50',
            'image' => 'nullable',
            'content' => 'required|min:30',
        ]);
        
        $path = Storage::disk('public')->put('images', $data['image']);
        dd($path);

        $newpost = new Article;
        $newpost->user_id = Auth::id();
        $newpost->title = $data['title'];
        if($data['image']) {
            $newpost->image = $path;
        }
        $newpost->content = $data['content'];
        $newpost->slug = Str::of($newpost->title)->slug('-');

        $newpost->save();

        return redirect()->route('admin/posts.show', $newpost->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Article::where('slug', $slug)->first();

        return view('admin.show', compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Article::where('slug', $slug)->first();

        return view('admin.edit', compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $request->validate([
            'title' => 'required|max:50',
            'image' => 'image|nullable',
            'content' => 'required|min:30'
        ]);

        $post = Article::find($id);
        $post->title = $data['title'];
        if($data['image']) {
            $post->image = $data['image'];
        }
        $post->content = $data['content'];
        $post->slug = Str::of($post->title)->slug('-');

        $post->update();

        return redirect()->route('admin/posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
