<?php

namespace App\Repository;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserRepo
{

    public function index()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
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
            $inputs['passord'] = Hash::make($inputs['password']);
            $user = User::create($inputs);
            return redirect()->route('home.customer');
        }
    }

    public function checkLogin(Request $request, Response $response)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home.customer');
        }
    }

    public function logOut(Request $request)
    {
        Auth::logout();
        Cookie::queue(Cookie::forget('user_logged_in'));
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
