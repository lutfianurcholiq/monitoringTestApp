<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ErrorListController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TestScenarioController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.main');
})->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// Register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

// Project
Route::resource('/project', ProjectController::class)->middleware('sa','group');
// Module
Route::resource('/module', ModuleController::class)->middleware('sa');

// TestScenario
Route::resource('/testscenario', TestScenarioController::class)->middleware('qa','group');

//Group
Route::resource('/group', GroupController::class)->middleware('admin');

//Error
Route::resource('/errorList', ErrorListController::class)->middleware('auth','group');

// Profile
Route::resource('/profile', ProfileController::class)->middleware('auth');