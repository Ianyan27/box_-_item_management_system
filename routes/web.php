<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoxManagementController;
use App\Http\Controllers\DummyDataController;
use App\Http\Controllers\ItemManagementController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [
    UserController::class, 'index'
])->name('login');

Route::get('/register', [
    UserController::class, 'registerNewUser'
])->name('register');

Route::post('/register', [
    UserController::class, 'registerUser'
]);
Route::post('/login', [
    UserController::class, 'login'
])->name('login');
Route::post('/logout', [
    UserController::class, 'logout'
])->name('logout');

Route::get('/otp', 
    fn() => view('auth.otp')
)->name('otp.form');

Route::post('/send-otp', [
    AuthController::class, 'sendOtp'
])->name('otp.send');

Route::post('/verify-otp', [
    AuthController::class, 'verifyOtp'
])->name('otp.verify');

Route::get('/auth/google', [
    AuthController::class, 'redirectToGoogle'
    ])->name('google.login');

Route::get('/auth/google/callback', [
    AuthController::class, 'handleGoogleCallback'
]);

Route::middleware('auth')->group(function () {
    Route::get('/item', [
        ItemManagementController::class, 'index'
    ])->name('item.dashboard');
    Route::get('/box',  [
        BoxManagementController::class, 'index'
    ])->name('box.dashboard');
    Route::get('/users', [
        UserController::class, 'index'
    ])->name('user.dashboard');
});

Route::middleware('auth')->group(function () {

    Route::post('/logout',[
        AuthController::class, 'logout'
    ])->name('logout');

    Route::get('/api/item', [
        ItemManagementController::class, 'getItems'
    ]);
    Route::get('/item', [
        ItemManagementController::class, 'index'
    ])->name('item.dashboard');
    Route::post('/items', [
        ItemManagementController::class, 'addItem'
    ])->name('items.store');
    Route::put('/items/{id}', [
        ItemManagementController::class, 'updateItem'
    ])->name('items.update');
    Route::delete('/items/{id}', [
        ItemManagementController::class, 'deleteItem'
    ])->name('items.delete');


    Route::get('/api/box', [
        BoxManagementController::class, 'getBoxes'
    ]);
    Route::get('/box', [
        BoxManagementController::class, 'index'
    ])->name('box.dashboard');
    Route::post('/boxes', [
        BoxManagementController::class, 'addBox'
    ])->name('boxes.store');
    Route::put('/boxes/{id}', [
        BoxManagementController::class, 'updateBox'
    ])->name('boxes.update');
    Route::delete('/boxes/{id}', [
        BoxManagementController::class, 'deleteBox'
    ])->name('boxes.delete');

    Route::get('/users', [
        UserController::class, 'getUsers'
    ])->name('user.dashboard');
    Route::post('/users', [
        UserController::class, 'addUser'
    ])->name('user.store');
    Route::put('/users/{id}', [
        UserController::class, 'updateUser'
    ])->name('user.update');
    Route::delete('/users/{id}', [
        UserController::class, 'deleteUser'
    ])->name('user.delete');

});