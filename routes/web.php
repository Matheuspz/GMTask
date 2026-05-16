<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
})->middleware('guest');

Route::get('/', function () {
    return redirect()->route('tasks.index');
})->middleware('auth');

// LOGIN
Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');

Route::post('/login/post', LoginController::class)
    ->middleware('guest')
    ->name('login.post');

// REGISTER
Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');

Route::post('/register/post', RegisterController::class)
    ->middleware('guest')
    ->name('register.post');

// LOGOUT
Route::post('/logout', LogoutController::class)
    ->middleware('auth')
    ->name('logout');

// TASKS
Route::middleware('auth')->group(function () {
    Route::controller(TaskController::class)->group(function () {
        Route::get('tasks', 'index')
            ->name('tasks.index');

        Route::get('tasks/create', 'create')
            ->name('tasks.create');
        Route::post('tasks', 'store')
            ->name('tasks.store');

        Route::get('tasks/{task}/edit', 'edit')
            ->name('tasks.edit');
        Route::put('tasks/{task}', 'update')
            ->name('tasks.update');

        Route::delete('tasks/{task}', 'destroy')
            ->name('tasks.destroy');
    });
});

