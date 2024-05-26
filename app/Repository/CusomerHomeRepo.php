<?php 

namespace App\Repository;

use App\Models\Post;

class CusomerHomeRepo {
    public function index()
    {
        $latestPost = Post::select('id', 'title', 'created_at', 'body')->where('status', 1)->orderBy('created_at')->get();
        return view('customers.index', compact('latestPost'));
    }

    public function  showPost(Post $post)
    {
        return view('customers.show-post', compact('post'));
    }
}