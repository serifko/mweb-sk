<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    
    public function index($category_slug = null){
        if($category_slug){
            $category = Category::where('slug', $category_slug)->first();
            $posts = Post::where('status', 'PUBLISHED')->where('category_id', $category->id)->orderBy('created_at', 'DESC')->with('user', 'category')->paginate(1);
        }else{
            $posts = Post::where('status', 'PUBLISHED')->orderBy('created_at', 'DESC')->with('user', 'category')->paginate(1);
        }
        return Inertia::render('Post/Index', [
            'posts' => $posts
        ]);
    }

    public function show($post){
        $post_data = Post::where('slug', $post)->where('status', 'PUBLISHED')->with('user', 'category')->first();
        return Inertia::render('Post/Show', [
            'post' => $post_data
        ]);
    }   

}
