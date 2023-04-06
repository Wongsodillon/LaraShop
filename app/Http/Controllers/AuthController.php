<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $userId = Auth::id();
            return redirect('/welcome/'.$userId);
        }

        // Authentication failed...
        return redirect('/loginError')->with('error', 'Invalid username or password');
    }
}