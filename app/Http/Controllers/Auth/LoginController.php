<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function create() {
        return Inertia::render("Auth/Login");
    }

    public function store(Request $request) {
        $credentials  = $request->validate([
            "email" => ["required", "email"],
            "password" => "required"
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended("/");
        }

        return Inertia::render("/login");
    }


    public function getRegister() {
        return Inertia::render("Auth/Register");
    }

    public function register(Request $request){
        $attributes  = $request->validate([
            "name" => "required",
            "email" => ["required",  "email"],
            "password" => "required"
        ]);
        // create user
        $user  =  User::create($attributes);
        // redirect user


        if($user){
            return redirect("/auth/login");
        }
        return redirect("/auth/register");
    }

    public function  destroy() {
        Auth::logout();
        return redirect("/auth/login");
    }
}
