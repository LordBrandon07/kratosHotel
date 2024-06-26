<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HabitacioneController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\DetalleFacturaController;
use App\Http\Controllers\ForgetPasswordManagerController;



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

Route::get('/', function () {
    return view('home');
});

Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class)->middleware('auth');
Route::resource('tipos', TipoController::class)->middleware('auth');
Route::resource('habitaciones', HabitacioneController::class)->middleware('auth');
Route::resource('estados', EstadoController::class)->middleware('auth');
Route::resource('reservas', ReservaController::class)->middleware('auth');
Route::resource('servicios', ServicioController::class)->middleware('auth');
Route::resource('facturas', FacturaController::class)->middleware('auth');
Route::resource('detalle-facturas', DetalleFacturaController::class)->middleware('auth');


Route::get('auth/create', [UserController::class,'create'])->name('auth.create');
Route::get('login', [LoginController::class,'index'])->name('login');
Route::post('logout', [LogoutController::class,'store'])->name('logout');
Route::post('login', [LoginController::class,'store']);
Route::get('home', [HomeController::class,'index'])->name('home')->middleware('auth');



Route::get('/forget-password', [ForgetPasswordManagerController::class,'forgetPassword'])->name('forget.password');
Route::post('/forget-password', [ForgetPasswordManagerController::class,'forgetPasswordPost'])->name('forget.password.post');

Route::get('/reset-password/{token}', [ForgetPasswordManagerController::class,'resetPassword'])->name('reset.password');
Route::post('/reset-password', [ForgetPasswordManagerController::class,'resetPasswordPost'])->name('reset.password.post');



Route::get('/factura/{id}', 'FacturaController@imprimirFactura');
