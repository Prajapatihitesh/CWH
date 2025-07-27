<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\LanguageController;
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

Route::get('/', function(){
    return redirect('index');
})->name("index");
Route::get('/index', [HomeController::class,"showHome"])->name("index");
Route::get('/language/{lid?}/{tid?}',[HomeController::class,"showTopic"])->name("language");

// admin routes
Route::get('/admin', function(){
    return view('admin.index');
})->name('admin.login');
Route::post('/admin/login',[LoginController::class,'submit'])->name('admin.login.submit');
Route::get('/admin/dashboard',[LoginController::class,'index'])->name('admin.dashboard');
Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('topic',TopicController::class);
});
Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('language',LanguageController::class);
});
