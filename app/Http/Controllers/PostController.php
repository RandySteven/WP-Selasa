<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function create(){
        $categories = Category::get();
        $tags = Tag::get();
        return view('post.create', compact('categories', 'tags'));
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
            'image' => 'image|mimes:png,jpg,jpeg,gif|max:2048',
            'desc' => 'required|min:5'
        ]);
        $data = $request->all();
        $data['slug'] = \Str::slug($request->title);
        $data['category_id'] = $request->get('category_id');
        $data['image'] = $request->file('image')->store("images/");
        $post = auth()->user()->posts()->create($data);
        $post->tags()->attach($request->get('tags'));
        return redirect('/');
    }

    public function index(){
        $posts = Post::latest()->paginate(3);
        return view('post.index', compact('posts'));
    }

    public function show(Post $post){
        return view('post.show', compact('post'));
    }

    public function edit(Post $post){
        $categories = Category::get();
        $tags = Tag::get();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'title' => 'required|min:5|max:20',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'desc' => 'required|min:5'
        ]);
        $data = $request->all();
        $data['category_id'] = $request->get('category_id');
        $data['slug'] = \Str::slug($request->title);
        $request->file('image');
        if($request->file('image')){
            \Storage::delete($post->image);
            $image = $request->file('image')->store("images/");
        }else{
            $image = $post->image;
        }
        $data['image'] = $image;
        $data['user_id'] = auth()->user()->id;
        $post->update($data);
        return redirect('/');
    }

    public function delete(Post $post){
        \Storage::delete($post->image);
        $post->delete();
        return redirect('/');
    }
}
