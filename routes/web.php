<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;

Route::get('register', [UserController::class, 'showRegisterForm'])->name('register.form');
Route::post('register', [UserController::class, 'register'])->name('register');

Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login']);

Route::post('logout', [UserController::class, 'logout'])->name('logout');

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');

Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');

Route::get('/', [CompanyController::class, 'showListCompanies'])->name('home');

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard', [JobController::class, 'recommendedJobs'])->name('dashboard');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/jobs/{JobID}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/companies/{CompanyID}', [CompanyController::class, 'show'])->name('companies.show');
