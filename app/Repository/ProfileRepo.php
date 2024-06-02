<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileRepo
{
    public function index()
    {
        $thisUser = Auth::user()->email;
        $user = User::where('email', $thisUser)->first();
        return view('customers.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $item = User::find($id);

        if (isset($_POST['public_mail']) && $_POST['public_mail'] != null && isset($_POST['birth_day']) && $_POST['birth_day'] != null) {
            $item->public_mail = $request->input('public_mail');
            $item->birth_day = $request->input('birth_day');
            $item->save();
            return redirect()->back();
        } elseif (isset($_POST['public_mail']) && $_POST['public_mail'] != null) {
            $item->public_mail = $request->input('public_mail');
            $item->save();
            return redirect()->back();
        } elseif (isset($_POST['birth_day']) && $_POST['birth_day'] != null) {
            $item->birth_day = $request->input('birth_day');
            $item->save();
            return redirect()->back();
        }
    }
}
