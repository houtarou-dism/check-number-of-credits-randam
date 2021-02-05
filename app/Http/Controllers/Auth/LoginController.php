<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return abort(404);
    }

    public function login()
    {
        return abort(404);
    }
}
