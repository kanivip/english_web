<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\homeAdminController;
use App\Http\Controllers\adminCategoriesController;
use App\Http\Controllers\adminVocabulariesController;
use App\Http\Controllers\adminLevelsController;
use App\Http\Controllers\questionsAdminController;
use App\Http\Controllers\vocabulariesController;
use App\Http\Controllers\adminUsersController;
use App\Http\Controllers\adminLessonsController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\lessonsController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\vipsController;
use Illuminate\Support\Facades\Auth;

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
//using for ajax
Route::get('/vocabulary/searchVocabulary', [vocabulariesController::class, 'searchVocabulary'])->name('searchVocabulary');
Route::get('/vocabulary/searchVocabularyById', [vocabulariesController::class, 'searchVocabularyById'])->name('searchVocabularyById');
Route::post('/questions/getQuestionsByLesson', [QuestionsController::class, 'getQuestionByLesson'])->name('getQuestionsByLesson');
Route::get('/questions/getAndCheckQuestion', [QuestionsController::class, 'getAndCheckQuestion'])->name('getAndCheckQuestion');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'lessons', 'as' => 'lessons.'], function () {
        Route::get('/index', [lessonsController::class, 'index'])->name('index');
        Route::get('/study/{id}', [lessonsController::class, 'study'])->name('study');
        //using for ajax
        Route::get('/checkcoinlesson', [lessonsController::class, 'checkCoinLesson'])->name('checkCoinLesson');
        Route::get('/loadMore', [lessonsController::class, 'loadMore'])->name('loadMore');
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/index/{id}', [profileController::class, 'index'])->name('index');
    });

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

        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('/index', [adminUsersController::class, 'index'])->name('index');
            Route::get('/create', [adminUsersController::class, 'create'])->name('create');
            Route::post('/store', [adminUsersController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [adminUsersController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [adminUsersController::class, 'update'])->name('update');
            Route::get('/ban/{id}', [adminUsersController::class, 'ban'])->name('ban');
            Route::get('/banned/{id}', [adminUsersController::class, 'banned'])->name('banned');
            Route::get('/unban/{id}', [adminUsersController::class, 'unban'])->name('unban');
            Route::get('/unbanned/{id}', [adminUsersController::class, 'unbanned'])->name('unbanned');
            Route::get('/vip/{id}', [vipsController::class, 'vip'])->name('vip');
            Route::get('/upgradeVip/{id}', [vipsController::class, 'upgradeVip'])->name('upgradeVip');
        });
        Route::group(['prefix' => 'levels', 'as' => 'levels.'], function () {
            Route::get('/index', [adminLevelsController::class, 'index'])->name('index');
            Route::get('/create', [adminLevelsController::class, 'create'])->name('create');
            Route::post('/store', [adminLevelsController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [adminLevelsController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [adminLevelsController::class, 'update'])->name('update');
            Route::get('/destroy/{id}', [adminLevelsController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'questions', 'as' => 'questions.'], function () {
            Route::get('/index', [questionsAdminController::class, 'index'])->name('index');
            Route::get('/create', [questionsAdminController::class, 'create'])->name('create');
            Route::post('/store', [questionsAdminController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [questionsAdminController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [questionsAdminController::class, 'update'])->name('update');
            Route::get('/destroy/{id}', [questionsAdminController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'lessons', 'as' => 'lessons.'], function () {
            Route::get('/index', [adminLessonsController::class, 'index'])->name('index');
            Route::get('/create', [adminLessonsController::class, 'create'])->name('create');
            Route::post('/store', [adminLessonsController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [adminLessonsController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [adminLessonsController::class, 'update'])->name('update');
            Route::get('/destroy/{id}', [adminLessonsController::class, 'destroy'])->name('destroy');
        });
    });
});