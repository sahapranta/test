<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoterLoginController extends Controller
{
    
    protected $redirectTo = '/';

    public function showVoterLoginForm()
    {
        return view('admin.auth.login');
    }

    protected function redirectTo()
    {
        return redirect('/');
    }
    
    public function voterAuthenticate(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
         ]);
        $cridentials = $request->only('username', 'password');
        if(Auth::guard('voter')->attempt($cridentials)){
            $request->session()->regenerate();
            notify()->success('You have logged in successfully');
            return redirect()->route('homepage');
        }

        notify()->error('Your provided cridetials doesnt match');
        return redirect()->back();
    }

    public function voterLogout()
    {
        Auth::guard('voter')->logout();
        return redirect()->route('voterLogin');
    }
}
