<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create(){
        return view('authorization');
    }

    public function store(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);

        if (! Auth::attempt($credentials)) {
            return back()
            ->withInput()
            ->withErrors([
                'email' => 'Неверный логин или пароль!'
            ]);
        }

        return redirect('news');
    }

    public function logout(){
        Auth::logout();
        return redirect('news');
    }
}