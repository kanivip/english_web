<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function changePassword(Request $request)
    {
        return view('auth.passwords.change');
    }

    public function storeChangePassword(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->password);
        $user->save();
        alert()->success('Change Password', 'You change password success');
        return redirect()->route('home');
    }
}