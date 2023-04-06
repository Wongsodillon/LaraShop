<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function login()
    {
        return view('loginPage');
    }
    public function welcomePage($id)
    {
        $user = Users::findOrFail($id);
        $userId = $user->UserID;
        $products = Product::all();
        return view('/welcome', ['id' => $userId, 'user' => $user, 'products' => $products]);
    }
    public function validateLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = Users::where('UserName', $username)->orWhere('UserEmail', $username)->firstOrFail();

        if ($user && $user->UserPassword == $password) {
            // Authentication passed...
            $userId = $user->UserID;
            $user = Users::findOrFail($userId);
            $products = Product::whereNotIn('UserID', [$userId])->get();
            return redirect()->route('welcome', ['id' => $userId, 'user' => $user, 'products' => $products]);
            // return redirect('/welcome/'.$userId)->with(['user' => $user, 'products' => $products]);
            // return redirect('/welcome')->with(['user' => $user, 'products' => $products]);
        }

        // Authentication failed...
        return redirect('/loginError')->with('error', 'Invalid username or password');
    }
    public function signUp()
    {
        return view('signUpPage');
    }
    public function register(Request $request)
    {
        // $request->validate([
        //     'UserPassword' => 'required|string|min:8'
        // ]);
        Users::create([
            'UserName' => $request->username,
            'UserEmail' => $request->email,
            'UserPassword' => $request->password
        ]);
        return redirect(route('home')); 
    }
}
