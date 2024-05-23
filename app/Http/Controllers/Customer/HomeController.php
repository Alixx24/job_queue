<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestPost = Post::select('id','title', 'created_at', 'body')->where('status', 1)->orderBy('created_at')->get();
        
        return view('customers.index', compact('latestPost'));
    }

    public function showPost(Post $post)
    {
       return view('customers.show-post', compact('post'));
    }
}
