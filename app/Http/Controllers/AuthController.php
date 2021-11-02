<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AuthController extends Controller
{
    //
    public function login(Request $request) {
        if($request->isMethod('post')){
            $credentials = $request->validate([                
                'email' => ['required','email'], //rfc and dns to validate if the email is valid or not
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('companies');
            }

            return back()->withErrors([
                'email'=>'The provide credentials do not meet our record',
            ]);
        
        }

        return view('auth.login');
    }

    public function logout(){
        if (Auth::check()){
            Auth::logout();
        }
        return redirect('login');
    }

    public function register(Request $request){
        if($request->isMethod('post')){
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'password' => 'required',
            'email' => 'required|unique:users|email:rfc,dns',
        ]);

        $requestData = $request->except(['password']);
        // $requestData['password'] = Hash::make($request->password);
        $requestData['password'] = bcrypt($request->password);

        // $requestData
        $user = User::create($requestData);
    }
        return view('auth.register');
    
    }

    
}
