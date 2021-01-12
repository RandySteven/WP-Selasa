<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('post.create');
    }

    public function store(Request $request){
        // Post::create([
        //     'title'=>$request->title,
        //     'price'=>$request->price,
        //     'desc'=>$request->desc,
        //     'slug'=>\Str::slug($request->title)
        // ]);
        $request->validate([
            'title' => 'required|min:5|max:20',
            'price' => 'required|numeric',
            'desc' => 'required|min:5'
        ]);
        $data = $request->all();
        $data['slug'] = \Str::slug($request->title);
        Post::create($data);

        return redirect('/')->with('success', 'Data insert success');
    }

    public function index(){
        $posts = Post::latest()->paginate(3);
        return view('post.index', compact('posts'));
    }

    public function show(Post $post){
        return view('post.show', compact('post'));
    }

    public function edit(Post $post){
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'title' => 'required|min:5|max:20',
            'price' => 'required|numeric',
            'desc' => 'required|min:5'
        ]);

        $post->update([
            'title'=>$request->title,
            'price'=>$request->price,
            'desc'=>$request->desc,
            'slug'=>\Str::slug($request->title)
        ]);
        //Setelah update
        //Kembali ke url utama
        return redirect('/');
    }

    public function delete(Post $post){
        $post->delete();
        return redirect('/');
    }
}
