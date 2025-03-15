<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Route::view('/admini', 'admin')
//      ->middleware(['auth'])
//      ->name('admini');

Route::view('/users', 'users')
     ->middleware(['auth'])
     ->name('users-table');    

Route::view('/members', 'members')
     ->middleware(['auth'])
     ->name('members-tables');

Route::view('/teenagers', 'teenagers')
     ->middleware(['auth'])
     ->name('members-tables');

Route::view('/dashboard', 'admin')
    ->middleware(['auth', 'verified'])
    ->name('admini');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
