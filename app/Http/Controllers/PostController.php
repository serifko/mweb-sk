<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;

class PostController extends Controller
{
    
    public function index(){
        $posts = Post::orderBy('created_at', 'DESC')->with('user')->paginate(1);
        return Inertia::render('Post/Index', [
            'posts' => $posts
        ]);
    }

    public function show($post){
        $post_data = Post::where('slug', $post)->with('user')->first();
        return Inertia::render('Post/Show', [
            'post' => $post_data
        ]);
    }

}
