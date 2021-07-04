<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PharIo\Manifest\Email;

class RegisterController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function store(Request $request){
       $user = $this->validate(request(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed']);
        $user['password'] = Hash::make($request->password);
        $user = User::create($user); 
}
}