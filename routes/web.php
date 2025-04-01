<?php
use App\Http\Controllers\Api\V1\TemperatureController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;


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
Route::get('/temperatures', [TemperatureController::class, 'index']);
Route::post('/temperatures', [TemperatureController::class, 'store']);

Route::get('/temperatura', function () {
    return view('temperatura');
});

Route::get('/', function () {
    return view('welcome');//welcome php
});

Auth::routes();
Route::get('register', [RegisterController::class, 'showRegistrationForm']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Rota para a página de histórico
Route::get('/historico', function () {
    return view('historico'); // Historico.blade.php
});

