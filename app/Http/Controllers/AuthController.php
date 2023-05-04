<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Throwable;

class AuthController extends Controller
{
    public function signup(Request $request) {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
            ]);

            $user = new User();
            $user->email = $request->get('email');
            $user->name = $request->get('name');
            $user->password = Hash::make($request->get('password'));
            $user->save();

            Auth::login($user, true);

            return redirect()->route('home')->with('success', 'Вы успешно зарегестрировались');
        } catch (Throwable $e) {
            return redirect()->route('register')->with('failure', 'Что-то пошло не так...');
        }
    }

    public function signout() {
        try {
            Auth::logout();
            return redirect()->route('home')->with('success', 'Вы успешно вышли из аккаунта!');
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('failure', 'Что-то пошло не так...');
        }
    }

    public function signin(Request $request) {
        try {
              
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            if (
                Auth::attempt([
                    'password' => $request->get('password'), 
                    'email' => $request->get('email')
                ], true)) {
                return redirect()->route('home')->with('success', 'Вы успешно вошли в аккаунт!');
            }

            return redirect()->route('login')->with('failure', 'Email или пароль не вверный');
        } catch (\Throwable $th) {
            return redirect()->route('login')->with('failure', 'Что-то пошло не так...');
        }

    }
}
