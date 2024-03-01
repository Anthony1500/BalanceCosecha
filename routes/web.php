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

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('inicio');
    });
});
Route::get('/LoginForm', [App\Http\Controllers\LoginController::class,'showLogin'])->name('LoginForm')->middleware('guest');


//Route::get('/iniciar_sesion', [App\Http\Controllers\LoginController::class,'showLogin']);

Auth::routes(['login' => false]);

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class,'login'])->name('auth.login');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class,'register'])->name('auth.register');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
