<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/', [ProductController::class, 'fetchData']);

Route::get('/delete/{id}', [ProductController::class, 'DeleteProduct']);

Route::get('/product/{id}', [ProductController::class, 'DetailProduct']);


Route::get('/edit-product/{id}', [ProductController::class, 'EditProduct']);

Route::get('/show-form', [ProductController::class, "showForm"]);

Route::post('/submit-form', [ProductController::class, 'submitHandler']);

Route::post('/update-product/{id}', [ProductController::class, 'UpdateHandler']);



Route::get('/contact', [ContactController::class, "contactForm"]);
Route::post('/submit-contact', [ContactController::class, "sendmail"]);
