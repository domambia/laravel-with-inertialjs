<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


Route::prefix("auth")->group(function () {
    Route::get("/login", [LoginController::class,  "create"])->name("login");
    Route::post("/login", [LoginController::class,  "store"]);
    Route::post("/register", [LoginController::class,  "register"])->name("register");
    Route::get("/register", [LoginController::class,  "getRegister"])->name("register");
});

// authenticate Routes
Route::middleware("auth")->group(function(){
    Route::get('/', function () {
        return Inertia::render('Home');
    });
    Route::get("/users", function() {
        return Inertia::render("Users/Index",  [
            "users" => User::query()
                ->when(Request::input("search"), function ($query, $search){
                    $query->where("name",  "like", '%' . $search . '%');
                })->paginate(15)->withQueryString()
                ->through(fn($user) =>[
                    "id" => $user->id,
                    "name"=> $user->name,
                    "email"=>$user->email,
                    "created_at"=>$user->created_at
                ]),
            "filters" => Request::only(["search"])
        ]);
    });
    Route::post("/users", function() {
        //validate the request
        $attributes  = Request::validate([
            "name" => "required",
            "email" => ["required",  "email"],
            "password" => "required"
        ]);
        // create user
        $user  =  User::create($attributes);
        // redirect user


        if($user){
            return redirect("/users");
        }
        return redirect("/users/create");
    });
    Route::get("/settings", function() {
        return Inertia::render("Settings");
    });


// Create user
    Route::get("/users/create", function() {
        return Inertia::render("Users/Create");
    });

    Route::post("/logout",[LoginController::class,  "destroy"])->name("logout");
});


