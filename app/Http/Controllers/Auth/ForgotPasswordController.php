<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ForgotPasswords;

class ForgotPasswordController extends Controller
{
    //
    // use ForgotPasswords;
    protected $redirectTo = RouteServiceProvider::HOME;
}
