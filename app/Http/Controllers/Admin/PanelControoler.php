<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;


class PanelControoler extends Controller
{
    public function index()
    {
        $countPost = Post::count();
        $postStatusActived = Post::select('status')->where('status', 1)->count();
        $postStatusDisabled = Post::select('status')->where('status', 0)->count();

        return view('panel.home', compact('countPost', 'postStatusActived', 'postStatusDisabled'));
    }
}
