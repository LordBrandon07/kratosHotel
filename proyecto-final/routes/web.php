<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HabitacioneController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\DetalleFacturaController;



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
    return view('auth.login');
});

Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::resource('empleados', EmpleadoController::class)->middleware('auth');
Route::resource('clientes', ClienteController::class)->middleware('auth');
Route::resource('habitaciones', HabitacioneController::class)->middleware('auth');
Route::resource('estados', EstadoController::class)->middleware('auth');
Route::resource('reservas', ReservaController::class)->middleware('auth');
Route::resource('servicios', ServicioController::class)->middleware('auth');
Route::resource('categoria', CategoriaController::class)->middleware('auth');
Route::resource('producto', ProductoController::class)->middleware('auth');
Route::resource('factura', FacturaController::class)->middleware('auth');
Route::resource('detalle', DetalleFacturaController::class)->middleware('auth');


Route::get('auth/create', [UserController::class,'create'])->name('auth.create');
Route::get('login', [LoginController::class,'index'])->name('login');
Route::post('logout', [LogoutController::class,'store'])->name('logout');
Route::post('login', [LoginController::class,'store']);
Route::get('home', [HomeController::class,'index'])->name('home.index')->middleware('auth');