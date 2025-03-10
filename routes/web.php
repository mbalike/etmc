<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('/admini', 'admin')
     ->middleware(['auth']);

Route::view('/users', 'users')
     ->middleware(['auth'])
     ->name('users-table');    

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
