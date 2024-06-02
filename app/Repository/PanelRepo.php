<?php

namespace App\Repository;

use App\Models\Post;
use Illuminate\Http\Request;

class PanelRepo {
    public function index(Request $request)
    {
        $countPost = Post::count();
        $postStatusActived = Post::select('status')->where('status', 1)->count();
        $postStatusDisabled = Post::select('status')->where('status', 0)->count();
        
        return view('panel.home', compact('countPost', 'postStatusActived', 'postStatusDisabled'));
    }
}