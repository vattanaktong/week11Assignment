<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function store(Request $request){
        $field = $request->validate([
            'name'=> 'required|string', 
            'email'=> 'required|string|unique:users,email', 
            'password'=> 'required|string'
        ]);
        $user = User::create([
            'name' => $field['name'],
            'email' => $field['email'],
            'password' => bcrypt($field['password']),
            'role' => $request->role, 
            'api_token' => Str::random(60) 
            ]
        ); 
     
        return response($user, 201); 
    }
    public function login(Request $request){
        $field = $request->validate([
            'email'=> 'required|string|', 
            'password'=> 'required|string|'
        ]);

        $user = User::where('email', $field['email'])->first();

        if(Auth::attempt($request->only('email', 'password'))){
            
            return response(Auth::user(), 200); 
        }

    }

}
