<?php


use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});
Route::resource('/teachers', \App\Http\Controllers\TeacherController::class);
Route::resource('/students', \App\Http\Controllers\StudentController::class);
Route::resource('/sources', \App\Http\Controllers\SourceController::class);

Route::resource('/meetings', \App\Http\Controllers\MeetingController::class)->except(['index']);

Route::resource('/groups', \App\Http\Controllers\GroupController::class);

