<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Mengarahkan ke tampilan login
    }

    public function login(Request $request)
    {
        // Logika untuk memproses login
    }
}
