<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();
        $home_welcome = setting('site.home_welcome');
        return Inertia::render('Home/Index', [
            'posts' => $posts,
            'home_welcome' => $home_welcome
        ]);
    }
}
