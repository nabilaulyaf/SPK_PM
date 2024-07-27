<?php

namespace App\Http\Controllers;

use App\Models\MasterUser;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        $user = MasterUser::where('username', $username)->first();

        if ($user && md5($password) === $user->password) {
            $request->session()->put('id_user', $user->id_user);
            $request->session()->put('username', $user->username);
            $request->session()->put('nama', $user->nama);

            $request->session()->put('logged_in_username', $user->username);

            return redirect()->route('home');
        } else {
            return redirect()->route('login')->withErrors([
                'login_error' => 'Username dan Password tidak ditemukan.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }
}
