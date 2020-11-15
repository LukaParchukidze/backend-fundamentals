<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register() {
        return view('register');
    }

    public function postRegister(RegistrationRequest $request) {
        $user = new User($request->all());

        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->route('welcome');
    }

    public function login() {
        return view('login');
    }

    public function postLogin(LoginRequest $request) {
        $credentials = $request->except(('_token'));

        if (Auth::attempt($credentials)) {
            return redirect()->route('my_posts');
        } else {
            abort(403);
        }
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('welcome');
    }
}
