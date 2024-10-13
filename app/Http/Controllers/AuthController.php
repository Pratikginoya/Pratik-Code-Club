<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
            ],
            'password2' => [
                'required',
            ],
        ],[
            'name.required' => 'Name is required',
            'name.min' => 'Name must be :min character',
            'name.max' => 'Name must be :max character',
            'email.required' => 'Email is required',
            'email.email' => 'It must be an email',
            'email.unique' => 'Email already exist',
            'password.required' => 'Password is required',
            'password.regex' => 'The password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character.',
            'password2.required' => 'Please re-enter the password',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password == $request->password2){
            $user->password = Hash::make($request->password);
        }else{
            return back()->with('loginError','Re-entered password not match');
        }

        $user->save();

        return redirect('/login')->with('success', 'Registration successful! Please login.');
    }
}
