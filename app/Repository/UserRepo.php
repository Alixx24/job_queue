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
            dd($user);
        }
    }

    public function checkLogin(Request $request, Response $response)
    {
      
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            //it gives me the auth user object
                        return redirect()->route('panel');

            // dd(auth()->user()->id);
        }
        // $inputs = $request->all();
        // if (!User::where('email', $inputs['email'])->exists()) {
        //     var_dump('email not exist');
        // } else {
        //     $checkDb = User::where('email', $inputs['email'])->get();
        //     $passInput = $checkDb[0]['password'];
        //     $user = $inputs['email']; 
        //     $result = Hash::check($inputs['password'], $passInput);

        //     if ($result) {
        //         cookie()->queue(cookie('user_logged_in', $user, 60));

        //         return redirect()->intended(redirect()->back());
        //         return redirect()->route('panel');
        //     } else {
        //         dd('password incorrect');
        //     }
        // }
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
