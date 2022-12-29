<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view ("pages.users.index",compact('users'));
    }
    public function modifyUser(Request $request, User $user)
    {
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "password"=>"required"
        ]);
        $user->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$request->password

        ]);    
        return Redirect::to('users-view')->with("successU","Le profil a été modifié avec succès!");
    }
    public function monprofil(){

        $users = User::all();
        return view("pages.users.monprofil",compact("users"));
    }
    
}