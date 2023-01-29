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
})->middleware('auth');


Route::resource('/students', \App\Http\Controllers\StudentController::class)->middleware('auth');

Route::post('/students/addsource', [\App\Http\Controllers\StudentController::class, 'addSourse'])->middleware('auth')->name('students.addsource');
Route::post('/students/delsource', [\App\Http\Controllers\StudentController::class, 'delSourse'])->middleware('auth')->name('students.delsource');

Route::resource('/sources', \App\Http\Controllers\SourceController::class)->middleware('auth');

Route::resource('/meetings', \App\Http\Controllers\MeetingController::class)->except(['index'])->middleware('auth');

Route::resource('/groups', \App\Http\Controllers\GroupController::class)->middleware('auth');


Auth::routes();


