<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EbookController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('login'));

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth.session')->group(function () {
    Route::get('/dashboard', [EbookController::class, 'index'])->name('dashboard');
    Route::post('/ebooks', [EbookController::class, 'store'])->name('ebooks.store');
    Route::delete('/ebooks/{ebook}', [EbookController::class, 'destroy'])->name('ebooks.destroy');
    Route::get('/ebooks/view/{ebook}', [EbookController::class, 'view'])->name('ebooks.view');
    Route::get('/ebooks/file/{ebook}', [EbookController::class, 'file'])->name('ebooks.file');
});

