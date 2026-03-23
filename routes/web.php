<?php

use App\Http\Controllers\BoxManagementController;
use App\Http\Controllers\DummyDataController;
use App\Http\Controllers\ItemManagementController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[
    UserController::class, 'index'
])->name('/');

Route::post('/login', [
    UserController::class, 'login'
])->name('login');

Route::get('/register', [
    UserController::class, 'registerNewUser'
])->name('register');

Route::post('/register', [
    UserController::class, 'registerUser'
])->name('register');

Route::post('/logout', [
    UserController::class, 'logout'
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

Route::get('/api/box/1', [
    DummyDataController::class, 'prepareDummyData'
]);


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