<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers;
use App\Http\Controllers\ProductController;
use App\Models\Users;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('login');
// });
Route::get('/', [UsersController::class, 'login'])->name('home');
Route::get('/welcome/{id}', [UsersController::class, 'welcomePage'])->name('welcome');
Route::post('/validateLogin', [UsersController::class, 'validateLogin']);
Route::get('/signup', [UsersController::class, 'signUp']);
Route::post('/register', [UsersController::class, 'register']);
Route::get('/addProductsPage/{id}', [ProductController::class, 'addProductsPage'])->name('addProductsPage');
Route::post('/storeProduct/{id}', [ProductController::class, 'storeProduct']);
Route::get('/updateProductView/{id}', [ProductController::class, 'updateProductView']);
Route::patch('/update/{userid}/{productid}', [ProductController::class, 'updateProduct']);
Route::delete('deleteProduct/{userid}/{id}', [ProductController::class, 'deleteProduct']);