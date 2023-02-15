<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\CustomersController;

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

Route::get('/', [PagesController::class, 'index']);

Route::get('/register', [AuthController::class, 'register'])->name('register');;
Route::post('/register', [AuthController::class, 'submit_register']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'submit_login']);

Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/vehicles', [VehiclesController::class, 'index'])->name('vehicles.index');
Route::get('/vehicles/available', [VehiclesController::class, 'available']);
Route::get('/vehicles/create', [VehiclesController::class, 'create']);
Route::post('/vehicles/create', [VehiclesController::class, 'store']);
Route::get('/vehicles/edit/{id}', [VehiclesController::class, 'edit']);
Route::post('/vehicles/edit/{id}', [VehiclesController::class, 'update']);
Route::post('/vehicles/delete', [VehiclesController::class, 'destroy']);


Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrdersController::class, 'create']);
Route::post('/orders/store', [OrdersController::class, 'store']);
Route::get('/orders/edit/{id}', [OrdersController::class, 'edit']);
Route::post('/orders/edit/{id}', [OrdersController::class, 'update']);
Route::post('/orders/delete', [OrdersController::class, 'destroy']);
Route::post('/orders/assign', [OrdersController::class, 'assign']);



Route::get('/customers', [CustomersController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomersController::class, 'create']);
Route::post('/customers/create', [CustomersController::class, 'store']);
Route::get('/customers/edit/{id}', [CustomersController::class, 'edit']);
Route::post('/customers/edit/{id}', [CustomersController::class, 'update']);
Route::post('/customers/delete', [CustomersController::class, 'destroy']);

