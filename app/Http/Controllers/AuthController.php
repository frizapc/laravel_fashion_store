<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function register () {
        return view('auth.register');
    } 
    public function registering (StoreRegisterRequest $request) {
        $data = $request->validated();
        $user = User::create($data);
        $this->push_notify($user);
        return redirect('/auth/login');
    } 
    public function login () {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $request->validate([
            "email"=>"required|exists:users,email|email:dns|max:100",
            "password"=>"required|min:3",
        ]);

        $user = $request->only(['email', 'password']);
        
        if(Auth::attempt($user, false)){
            return redirect('/fashions');
        }else {
            return redirect('/auth/login')->with('error', 'Password salah')->withInput();
        }
    }
    public function logout () {
        session()->flush();
        return redirect('/auth/login');
    }

    private function push_notify($user){
        $url = "https://api.telegram.org/bot6835781862:AAHr0W77MZZSdwMxpijNzGeo701YX8FHIJQ/sendMessage";
        $chat_id = -4273487245;
        $message = "<strong>$user->name</strong> telah membuat akun";
        $data = [
            "chat_id" => $chat_id,
            "text" => $message,
            "parse_mode" => "HTML"
        ];
        Http::post($url,$data);
    }
}
