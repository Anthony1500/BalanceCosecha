<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
   return view('inicio');
});
Route::get('/LoginForm', [App\Http\Controllers\LoginController::class,'showLogin'])->name('LoginForm');
//Route::get('/iniciar_sesion', [App\Http\Controllers\LoginController::class,'showLogin']);


Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
