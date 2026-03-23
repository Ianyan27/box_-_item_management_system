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
    UserController::class, 'store'
])->name('register');

Route::get('/item', [
    ItemManagementController::class, 'index'
])->name('item.dashboard');

Route::get('/api/item', [
    ItemManagementController::class, 'getItems'
]);

//I need to pass an item for post request

Route::post('/api/box/{box_id}/item/{name}', [
    ItemManagementController::class, 'addItem'
]);

Route::patch('/api/item/{id}', [
    ItemManagementController::class, 'updateItem'
]);

Route::delete('/api/item/{id}', [
    ItemManagementController::class, 'deleteItem'
]);

Route::get('/api/box/1', [
    DummyDataController::class, 'prepareDummyData'
]);

Route::get('/box', [
    BoxManagementController::class, 'index'
])->name('box.dashboard');

Route::get('/api/box', [
    BoxManagementController::class, 'getBoxes'
]);

Route::post('/api/box/{name}', [
    BoxManagementController::class, 'addBox'
]);

Route::patch('/api/box/{id}', [
    BoxManagementController::class, 'updateBox'
])->name('boxes.update');

Route::delete('/api/box/{id}', [
    BoxManagementController::class, 'deleteBox'
]);