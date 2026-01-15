<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view("form.login");
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
    public function register(){
        return view("form.register");
    }
    public function recover(){
        return view("form.recover");
    }

    public function authUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        // usuário não existe
        if (!$user) {
            return back()
                ->withErrors(['email' => 'Usuário não encontrado'])
                ->withInput();
        }

        // senha incorreta
        if (!Hash::check($request->password, $user->password)) {
            return back()
                ->withErrors(['password' => 'Senha incorreta'])
                ->withInput();
        }

        // login
        Auth::login($user);

        return redirect('/admin/dashboard');
    }


    public function registerUser(Request $request){
        $user = new User;
        $user->name = "Sabrina";
        
        $user->cpf = "123456789";
        $user->email = $request->email;
        
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect("/admin/dashboard");
    }
}
