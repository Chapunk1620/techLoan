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
    Route::get('/dashboard/dataItems', [Loans::class, 'getItemsData'])->name('dashboard.data-items');
});
Route::post('/store', [Loans::class, 'store'])->name('loan.store');
Route::delete('/dashboard/delete/{id}', [Loans::class, 'destroy'])->name('loans.destroy');
Route::put('/dashboard/update/{id}', [Loans::class, 'update'])->name('loans.update');
Route::get('/dashboard/edit/{id}', [Loans::class, 'edit'])->name('loans.edit');
