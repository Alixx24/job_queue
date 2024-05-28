<?php 

namespace App\Repository;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CusomerHomeRepo {
    public function index()
    {
        $user = Auth::user();
        $latestPost = Post::select('id', 'title', 'created_at', 'body')->where('status', 1)->orderBy('created_at')->get();
        return view('customers.index', compact('latestPost', 'user'));
    }

    public function  showPost(Post $post)
    {
        return view('customers.show-post', compact('post'));
    }
}