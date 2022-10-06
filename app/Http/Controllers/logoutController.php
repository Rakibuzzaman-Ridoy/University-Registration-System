<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class logoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function passwordChangeFormOpen()
    {
        return view('passWordChangeForm');
    }

    public function passwordChangeFormDone(Request $request)
    {
        $request->validate([
            "current_password"=>"required",
            "password"=>"required|min:8|max:16|confirmed",
            "password_confirmation"=>"required",
        ]);

        $user = Auth::user();
        if(Hash::check($request->current_password,$user->password))
        {
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect('login')->with('success','Password Change Successful!');
            //return redirect()->back()->with('success','Password Change Successful!');
        }
        else
        {
            return redirect()->back()->with('error','Failed to change password!');
        }
    }
}
