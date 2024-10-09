<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Loans;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [Loans::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/data', [Loans::class, 'json']);
});
Route::post('/store', [Loans::class, 'store'])->name('loan.store');