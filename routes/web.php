<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\homeAdminController;
use App\Http\Controllers\adminCategoriesController;
use App\Http\Controllers\adminVocabulariesController;

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

Route::get('/put', function() {
    Storage::disk('google')->put('test.txt', 'Hello World123');
    return 'File was saved to Google Drive';
});

Route::get('/get', function() {
    $filename = 'ban chat 2.PNG';

    $dir = '/';
    $recursive = false; // Get subdirectories also?
    $contents = collect(Storage::disk('google')->listContents($dir, $recursive));

    $file = $contents
        ->where('type', '=', 'file')
        ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
        ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
        ->first(); // there can be duplicate file names!

    //return $file; // array with file info

    $rawData = Storage::disk('google')->get($file['path']);

    return view('test',['myFile' =>$rawData]);
});

Route::group(['middleware'=>'admin','prefix'=>'admin','as' => 'admin.'],function () {
    Route::get('/dashbroad', [homeAdminController::class, 'dashbroad'])->name('dashbroad');

    Route::group(['prefix'=>'categories','as' => 'categories.'],function () {
        Route::get('/index', [adminCategoriesController::class, 'index'])->name('index');
        Route::get('/create', [adminCategoriesController::class, 'create'])->name('create');
        Route::post('/store', [adminCategoriesController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [adminCategoriesController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [adminCategoriesController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [adminCategoriesController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix'=>'vocabularies','as' => 'vocabularies.'],function () {
        Route::get('/index', [adminVocabulariesController::class, 'index'])->name('index');
        Route::get('/create', [adminVocabulariesController::class, 'create'])->name('create');
        Route::post('/store', [adminVocabulariesController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [adminVocabulariesController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [adminVocabulariesController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [adminVocabulariesController::class, 'destroy'])->name('destroy');
    });
});