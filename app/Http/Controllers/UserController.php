<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function createUser(Request $request){
        $fields = $request->validate([
                'name'=>['required','string','max:255'],
                'email'=>['required','email', 'unique:users'],
                'password'=>['required','min:3','confirmed']

            ]);

            // dd($users);

          $user = User::create($fields);

         Auth::login($user);


         return redirect()->route('home');


    }

    public function login(Request $request){
        $fields = $request->validate([
            'email' => ['required', 'max:255','email'],
            'password' => ['required']

        ]);

        // dd($fields);

        if(Auth::attempt($fields,$request->remember)){
            // return redirect()->route('home');
            return redirect()->intended('dashboard');
        }else{
            return back()->withErrors(['failed'=>'Provided email or password is wrong']);
        }
    }


    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
