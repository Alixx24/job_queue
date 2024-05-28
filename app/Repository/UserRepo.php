<?php

namespace App\Repository;

use App\Models\User;
use App\Services\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie as FacadesCookie;
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

    public function checkLogin(Request $request)
    {
        $inputs = $request->all();
        if (!User::where('email', $inputs['email'])->exists()) {
            var_dump('email not exist');
        } else {
            $checkDb = User::where('email', $inputs['email'])->get();
            $passInput = $checkDb[0]['password'];

            $result = Hash::check($inputs['password'], $passInput);
            $cookie = cookie('user_name', json_encode($inputs), 60);
            // dd($cookie);
            return redirect()->route('panel');
            if ($result) {
                // $cookie = cookie('user_name', json_encode($inputs), 60);
                // return redirect()->intended('panel')->cookie($cookie);
            } else {
                dd('password incorrect');
            }
        }
    }

    public function logOut()
    {
        // dd('flush');
        session()->flush();
        return Redirect::back()->withErrors(['msg' => 'The Message']);
    }
}
