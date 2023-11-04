<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AuthController extends Controller
{

    public function signup(Request $request){
        // return dd($request->all());
        // save the values in the database

       $validated_input =  $request->validate([
            'name' => 'required | min:3',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:6'
        ],
    [
            'name.required' => 'Please enter a username.',
            'name.min' => 'Username must be at least 3 characters long.',
            'name.unique' => 'Username is already taken.',
            'email.required' => 'Please enter an email address.',
            'email.email' => 'Invalid email format.',
            'email.unique' => 'Email address is already registered.',
            'password.required' => 'Please enter a password.',
            'password.min' => 'Password must be at least 6 characters long.',
    ]);

        User::create($validated_input);

        return redirect('/login')->with(['msg' => 'Signup successful']);
    }

    public function login(Request $request){
        // return dd($request->all());
        $user_credential = $request->only(['email', 'password']);

        if(Auth::attempt($user_credential)){
            return redirect('/dashboard');
        }else{
            return redirect('login');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
