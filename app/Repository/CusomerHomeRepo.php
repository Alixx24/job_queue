<?php 

namespace App\Repository;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CusomerHomeRepo {
    public function index()
    {
        $user = Auth::user();
        $latestUser = User::orderBy('created_at', 'DESC')->take(10)->get();
        $latestPost = Post::select('id', 'title', 'created_at', 'body')->where('status', 1)->orderBy('created_at')->get();
        return view('customers.index', compact('latestPost', 'user', 'latestUser'));
    }

    public function  showPost(Post $post)
    {
        return view('customers.show-post', compact('post'));
    }
}