<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\bookRentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RentLogsController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[PublicController::class,'index']);

Route::middleware('only_guest')->group(function(){
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/login',[AuthController::class,'authenticating']);
    Route::get('/register',[AuthController::class,'register']);
    Route::post('/register',[AuthController::class,'registerProcess']);
});
    Route::middleware('auth')->group(function(){
        Route::get('/profile',[UserController::class,'profile'])->middleware('only_client');

        Route::middleware('only_admin')->group(function(){

            // route untuk dashboard
        Route::get('/dashboard',[DashboardController::class,'index']);

            // route untuk books
        Route::get('/books',[BooksController::class,'index']);
        Route::get('/books-add',[BooksController::class,'add']);
        Route::post('/books-add',[BooksController::class,'store']);
        Route::get('/books-edit/{slug}',[BooksController::class,'edit']);
        Route::post('/books-edit/{slug}',[BooksController::class,'update']);
        Route::get('/books-delete/{slug}',[BooksController::class,'delete']);
        Route::get('/books-destroy/{slug}',[BooksController::class,'destroy']);
        Route::get('/books-deleted',[BooksController::class,'deleted']);
        Route::get('/books-restore/{slug}',[BooksController::class,'restore']);


        // route untuk category
        Route::get('/categories',[CategoryController::class,'index']);
        Route::get('/categories-add',[CategoryController::class,'add']);
        Route::post('/categories-add',[CategoryController::class,'store']);
        Route::get('/categories-edit/{slug}',[CategoryController::class,'edit']);
        Route::put('/categories-edit/{slug}',[CategoryController::class,'update']);
        Route::get('/categories-delete/{slug}',[CategoryController::class,'delete']);
        Route::get('/categories-destroy/{slug}',[CategoryController::class,'destroy']);
        Route::get('/categories-deleted',[CategoryController::class,'deleted']);
        Route::get('/categories-restore/{slug}',[CategoryController::class,'restore']);


        // route untuk users
        Route::get('/users',[userController::class,'index']);
        Route::get('/registered-users',[userController::class,'registeredUsers']);
        Route::get('/users-detail/{slug}',[userController::class,'show']);
        Route::get('/users-approve/{slug}',[userController::class,'approve']);
        Route::get('/users-ban/{slug}',[userController::class,'delete']);
        Route::get('/users-destroy/{slug}',[userController::class,'destroy']);
        Route::get('/users-banned',[userController::class,'bannedUsers']);
        Route::get('/users-restore/{slug}',[userController::class,'restore']);
        
        // route untuk rentlogs
        Route::get('/rentlogs',[RentLogsController::class,'index']);
        Route::get('/books-rent',[bookRentController::class,'index']);
        Route::post('/books-rent',[bookRentController::class,'store']);
        Route::get('/books-return',[bookRentController::class,'bookReturn']);
        Route::post('/books-return',[bookRentController::class,'saveReturn']);

        });

    Route::get('/logout',[AuthController::class,'logout']);
});



