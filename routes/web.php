<?php

use App\Http\Middleware\SetCookie;
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

Route::group(['middleware' => [SetCookie::class]], function () {
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

	Route::get('/profesionales/{filter}/{name}', 'ProfessionalController@getProfessionalsByFilter')->name('professional.filter');

	Route::get('/especialidades', function () {
		return view('pages.specialist');
	})->name('specialist');

	Route::get('/noticias', function () {
		return view('pages.news');
	})->name('news');

	Route::get('/noticias/{id}', 'NewsController@getDetail')->name('news');

	Route::get('/planes', function () {
		return view('pages.plan');
	})->name('plan');

	Route::get('/preguntas-frecuentes', function () {
		return view('pages.question');
	})->name('question');
});

Route::get('/admin', function () {
	return view('pages.admin.test');
});

Route::get('/admin/consultas-frecuentes', function () {
	return view('pages.admin.questions');
})->name('admin.questions');
