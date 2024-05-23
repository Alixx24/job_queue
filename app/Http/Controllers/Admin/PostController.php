<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\LogPostAdmin;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
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

    public function store(Request $request)
    {
        $inputs = $request->all();

        $inputs['author_id'] = 1;
        $post = Post::create($inputs);
        LogPostAdmin::dispatch($post);
        return redirect()->route('panel.post')->with('success', 'created successfully!');
    }
}
