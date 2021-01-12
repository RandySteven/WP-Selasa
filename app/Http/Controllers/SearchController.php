<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request){
        //SELECT * FROM posts WHERE title LIKE %a%
        $posts = Post::where('title', 'LIKE', '%'.$request->search.'%')->latest()->paginate(3);
        return view('post.index', compact('posts'));
    }
}
