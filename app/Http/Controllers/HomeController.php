<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        return view("home", ["user" => auth()->user()]);
    }
    public function indexReg()
    {
        return view("signup");
    }
    public function indexLogin()
    {
        return view("signin");
    }
    public function registration(Request $request)
    {
        $request->validate(
            [
                "email" => "required|unique:users|email",
                "name" => "required",
                "password" => "required",
                "confirm" => "required|same:password",
            ],
            [
                "email.required" => "Поле обязательно для заполнения",
                "email.email" => "Введите правильный адрес",
                "email.unique" => "Данный адрес занят",
                "password.required" => "Поле обязательно для заполнения",
                "confirm.required" => "Поле обязательно для заполнения",
                "name.required" => "Поле обязательно для заполнения"
            ]
        );
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        return redirect("home");
    }
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required"
        ], [
            "email.required" => "Поле обязательно для заполнения",
            "password.required" => "Поле обязательно для заполнения",
        ]);
        $user = $request->only(["email", "password"]);
        if (Auth::attempt($user)) {
            return redirect("home");
        }else{
            return redirect()->back()->with("error","Неверный логин или пароль");
        }
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect("/");
    }
}
