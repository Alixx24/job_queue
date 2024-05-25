<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function create()
    {
        dd('cre');
        return view('auth.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string',
            'password' => 'required'
        ]);
        $inputs = $request->all();

        if (User::where('email', $inputs['email'])->exists()) {
            echo 'email alreade exist!';
        } else {
            echo 'you can';
        }

        // dd($inputs);
        // $inputs['author_id'] = 1;
        // $post = Post::create($inputs);
        // LogPostAdmin::dispatch($post);
        // return redirect()->route('panel.post')->with('success', 'created successfully!');
    }
}
