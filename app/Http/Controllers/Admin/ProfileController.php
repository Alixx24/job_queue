<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $thisUser = Auth::user()->email;
        $user = User::where('email', $thisUser)->first();

        return view('customers.profile.index', compact('user'));
    }

    public function birthDayUpdate(Request $request)
    {
    }

    public function update(Request $request)
    {
        // dd($request['public_mail']);
        if ($_POST) {

            dd('pu');
            $id = Auth::user()->id;
            $item = User::find($id);
            $item->birth_day = $request->input('birth_day');


            $item->save();
            return redirect()->back();
        }
    }
}
