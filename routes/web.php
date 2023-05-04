<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScheduleController;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function() {
    $schedules = Schedule::all();
    return view('home', compact('schedules'));
})->name('home');

Route::get('/login', function() {
    return view('login');
})->name('login');

Route::get('/register', function() {
    return view('register');
})->name('register');

Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::get('/signout', [AuthController::class, 'signout'])->name('signout');

Route::post('/signin', [AuthController::class, 'signin'])->name('signin');

Route::get('/create', [ScheduleController::class, 'create'])->name('create');

Route::get('/edit/{id}', [ScheduleController::class, 'edit'])->name('edit');

Route::post('/store', [ScheduleController::class, 'store'])->name('store');

Route::post('/update/{id}', [ScheduleController::class, 'update'])->name('update');

Route::get('/delete/{id}', [ScheduleController::class, 'destroy'])->name('delete');
