<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// LOGIN
Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');
Route::post('/login', LoginController::class);

// REGISTER
Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');
Route::post('/register', RegisterController::class);

/*
 *  TROCAR PARA 'auth' depois
*/
//Route::middleware('guest')->group(function () {
//    Route::controller(TaskController::class)->group(function () {
//        Route::get('tasks', 'index')
//            ->name('tasks.index');
//        Route::post('tasks', 'store')
//            ->name('tasks.store');
//        Route::get('tasks/{task}/edit', 'edit')
//            ->name('tasks.edit');
//        Route::put('tasks/{task}', 'update')
//            ->name('tasks.update');
//        Route::delete('tasks/{task}', 'destroy')
//            ->name('tasks.destroy');
//    });
//});

