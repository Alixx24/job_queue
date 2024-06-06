<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileRepo
{
    public function index(User $thisUser)
    {
      
        $user = $thisUser->findByMail();
     
        return view('customers.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
    

        $id = Auth::id(); 
        $user = User::find($id);
        $data = $request->only([
            'public_mail',
            'birth_day',
        ]);
        $validatedData = $request->validate([
            'public_mail' => 'nullable|email',
            'birth_day' => 'nullable|numeric'
        ]);
        if (!empty($data['public_mail']) || !empty($data['birth_day'])) {
            $user->update(array_filter($validatedData));
        }

        return redirect()->back();
    }
}
