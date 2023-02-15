<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function home() {
        return view('pages.home');
    }

    public function login() {
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }

    public function submit_login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return redirect('/login')->with('message', 'Login details invalid');
    }

    public function submit_register(Request $request) {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:4'
        ]);

        $data = $request->all();

        $create = $this->create($data);

        return redirect('/');
    }

    public function create(array $data) {
        // return $data;
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout() {
        Auth::logout();

        return redirect('login');
    }
}
