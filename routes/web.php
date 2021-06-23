<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\homeAdminController;
use App\Http\Controllers\adminCategoriesController;
use App\Http\Controllers\adminVocabulariesController;
use App\Http\Controllers\adminLevelsController;

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


Auth::routes();



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashbroad', [homeAdminController::class, 'dashbroad'])->name('dashbroad');

    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/index', [adminCategoriesController::class, 'index'])->name('index');
        Route::get('/create', [adminCategoriesController::class, 'create'])->name('create');
        Route::post('/store', [adminCategoriesController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [adminCategoriesController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [adminCategoriesController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [adminCategoriesController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'vocabularies', 'as' => 'vocabularies.'], function () {
        Route::get('/index', [adminVocabulariesController::class, 'index'])->name('index');
        Route::get('/create', [adminVocabulariesController::class, 'create'])->name('create');
        Route::post('/store', [adminVocabulariesController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [adminVocabulariesController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [adminVocabulariesController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [adminVocabulariesController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'levels', 'as' => 'levels.'], function () {
        Route::get('/index', [adminLevelsController::class, 'index'])->name('index');
        Route::get('/create', [adminLevelsController::class, 'create'])->name('create');
        Route::post('/store', [adminLevelsController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [adminLevelsController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [adminLevelsController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [adminLevelsController::class, 'destroy'])->name('destroy');
    });
});