<?php

namespace App\Repository;

use App\Http\Requests\Panel\PostRequest;
use App\Jobs\LogPostAdmin;
use App\Models\Post;
use Illuminate\Http\Request;

class PostRepo
{

    public function index()
    {
        $posts = Post::select()->orderBy('created_at')->get();
        return view('panel.index', compact('posts'));
    }

    public function create()
    {
        return view('panel.create');
    }

    public function store(PostRequest $request)
    {
        $inputs = $request->all();
        
        $inputs['author_id'] = 1;
        $post = Post::create($inputs);
        LogPostAdmin::dispatch($post);
        return redirect()->route('panel.post')->with('success', 'created successfully!');
    }
}
