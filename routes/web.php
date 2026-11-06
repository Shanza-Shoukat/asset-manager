<?php

use App\Http\Controllers\AssetAssignmentController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('wel');
// });
Route::middleware('guest')->group(function(){
 Route::get('/login',[LoginController::class, 'show'])->name('login');
 Route::post('/login',[LoginController::class, 'login'])->name('login.submit');

});
Route::middleware('auth')->group(function(){

    Route::get('/', [AssetController::class, 'dashboard']);
    // Route::get('/assets', [AssetController::class, 'index']);
    //assets
    Route::resource('assets', AssetController::class);
    // Route::get('/users', [UserController::class, 'index']);
    //user
    Route::resource('users', UserController::class);
    Route::post('/assets/{asset}/assign', [AssetController::class, 'assign']);
    Route::post('/assets/{asset}/unassign', [AssetController::class, 'unassign']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});

