<?php

namespace App\Repository;

use App\Http\Requests\Panel\PostRequest;
use App\Jobs\LogPostAdmin;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class PostRepo
{
   
    public function index()
    {
        $posts = Post::postsUser();
        return view('panel.index', compact('posts'));
    }

    public function create()
    {
        return view('panel.create');
    }

    public function store(PostRequest $request)
    {
        $inputs = $request->all();
        // $author = Cookie::get('user_logged_in');
        $author = Auth::user();
        // dd($author);
    

        $inputs['author_id'] = Auth::user()->id;

        $post = Post::create($inputs);
        LogPostAdmin::dispatch($post);
        return redirect()->route('panel.post')->with('success', 'created successfully!');
    }
}
