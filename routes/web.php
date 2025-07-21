<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class,'index'])->name('index');
Route::get('/create', [BookController::class,'create'])->name('usercreate');
Route::post('/store', [BookController::class,'store'])->name('userstore');
Route::get('/{id}/delete', [BookController::class,'delete'])->name('userdelete');
Route::get('/{id}/edit', [BookController::class,'edit'])->name('useredit');
Route::post('/{id}/update', [BookController::class,'update'])->name('userupdate'); 
