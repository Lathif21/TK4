<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('books', 'App\Http\Controllers\BookController')->except(['show', 'edit'])->names([
    'index' => 'books.index',
    'create' => 'books.create',
    'store' => 'books.store',
    'update' => 'books.update',
    'destroy' => 'books.destroy',
]);
