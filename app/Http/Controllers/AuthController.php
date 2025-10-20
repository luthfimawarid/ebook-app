<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $r) {
        $r->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $r->name,
            'email' => $r->email,
            'password' => Hash::make($r->password)
        ]);

        $r->session()->put('user_id', $user->id);
        return redirect()->route('dashboard');
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $r) {
        $r->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $r->email)->first();

        if (!$user || !Hash::check($r->password, $user->password)) {
            return back()->with('error', 'Email atau password salah!');
        }

        $r->session()->put('user_id', $user->id);
        return redirect()->route('dashboard');
    }

    public function logout(Request $r) {
        $r->session()->flush();
        return redirect()->route('login');
    }
}
