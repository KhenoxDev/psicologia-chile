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
	return view('pages.welcome');
})->name('home');

Route::get('/quienes-somos', function () {
	return view('pages.about');
})->name('about');

Route::get('/como-funciona', function () {
	return view('pages.work');
})->name('work');

Route::get('/profesionales', function () {
	return view('pages.professional');
})->name('professional');

Route::get('/profesionales/{id}', 'ProfessionalController@getDetail')->name('professional');
Route::get('/especialidades', function () {
	return view('pages.specialist');
})->name('specialist');
