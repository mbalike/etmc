<?php

use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');

Route::view('/', 'admin')
     ->middleware(['auth','verified'])
     ->name('dashboard');

Route::view('/maini','livewire.layout')
     ->middleware(['auth'])
     ->name('main');
     
Route::view('/main','main')
     ->middleware(['auth'])
     ->name('maini');

Route::view('/events', 'events')
     ->middleware(['auth'])
     ->name('events');

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
Route::view('/marriages', 'marriages')
     ->middleware(['auth'])
     ->name('marriages-tables');

Route::view('/deaths', 'deaths')
     ->middleware(['auth'])
     ->name('deaths-tables');

Route::view('/transfers', 'transfers')
     ->middleware(['auth'])
     ->name('transfers-tables');

Route::view('/baptisms', 'baptism')
     ->middleware(['auth'])
     ->name('baptisms-tables');

// Route::view('/dashboard', 'admin')
//      ->middleware(['auth', 'verified'])
//      ->name('admini');

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
