<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Books;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm() {
        return view('auth.login');
    }

    public function login(Request $req) {
        $data = $req->validate([
            "login_email" => ["required", "email", "string"],
            "login_password" => ["required"]
        ]);

        if(auth("web")->attempt([
            "email" => $data["login_email"],
            "password" => $data["login_password"]
        ])) {
            return redirect(route("home"));
        }

        return redirect(route("login"))->withErrors(["login_email" => "Пользователь не найден, либо данные введены не правильно"]);
    }

    public function logout(Request $req) {
        auth("web")->logout();

        return redirect(route('home'));
    }

    public function registration(Request $req) {
        $data = $req->validate([
            "registration_name" => ["required", "string"],
            "registration_email" => ["required", "string", "email", "unique:users,email"],
            "registration_password" => ["required", "string", "confirmed"]
        ]);
        
        $user = User::create([
            "name" => $data["registration_name"],
            "email" => $data["registration_email"],
            "password" => bcrypt($data["registration_password"])
        ]);

        if($user) {
            auth("web")->login($user);
        }

        return redirect(route('home'));
    }
}
