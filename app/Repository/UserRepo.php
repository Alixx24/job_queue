<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            if ($result) {
                dd('login successfullt!');
            } else {
                dd('password incorrect');
            }
        }
    }
}
