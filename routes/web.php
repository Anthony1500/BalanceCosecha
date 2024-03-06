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

Route::middleware(['guest'])->group(function () {
Route::get('/loadscreen', function () {
    $path = resource_path('json/loadscreen.json');
    return response()->file($path);
});
});

//Route::get('/iniciar_sesion', [App\Http\Controllers\LoginController::class,'showLogin']);


Auth::routes(['login' => false]);
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class,'login'])->name('auth.login');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class,'register'])->name('auth.register');
Route::post('/Completeregister', [App\Http\Controllers\Auth\RegisterController::class,'registerall'])->name('auth.completeregister');
Route::get('/RegisterForm', [App\Http\Controllers\RegisterController::class,'registerform'])->name('RegisterForm');




//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
