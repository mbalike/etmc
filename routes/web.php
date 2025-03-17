<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('/dashboard', 'dashboard')
     ->middleware(['auth'])
     ->name('dashboard');

Route::view('/users', 'users')
     ->middleware(['auth'])
     ->name('users-table');    

Route::view('/members', 'members')
     ->middleware(['auth'])
     ->name('members-tables');

Route::view('/teenagers', 'teenagers')
     ->middleware(['auth'])
     ->name('teens-tables');
     
Route::view('/kids', 'kids')
     ->middleware(['auth'])
     ->name('teens-tables');

Route::view('/dashboard', 'admin')
    ->middleware(['auth', 'verified'])
    ->name('admini');

Route::get('/logout', function () {
     Auth::logout();
     session()->invalidate();
     session()->regenerateToken();
     return redirect('/login');
 })->name('logOut');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
