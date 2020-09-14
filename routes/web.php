<?php

use App\Http\Middleware\SetCookie;
use Illuminate\Routing\RouteGroup;
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

/* Client Routes */

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

/* Admin Routes */

Route::get('/admin/inicio', 'AuthController@index')->name('admin.form.login');
Route::post('/admin/iniciar', 'AuthController@postLogin')->name('admin.login');
Route::get('/admin/salir', 'AuthController@logout')->name('admin.logout');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/admin', function () {
		return view('pages.admin.home');
	})->name('admin.home');

	Route::get('/admin/consultas-frecuentes', function () {
		return view('pages.admin.questions');
	})->name('admin.questions');

	Route::get('/admin/configuracion/logo', function () {
		return view('pages.admin.generalities.logo');
	})->name('admin.logo');

	Route::post('/admin/configuracion/logo', 'GeneralityController@setLogo')->name('admin.store.logo');

	Route::get('/admin/configuracion/redes-sociales', function () {
		return view('pages.admin.generalities.social');
	})->name('admin.social');

	Route::get('/admin/configuracion/metodos-pago', function () {
		return view('pages.admin.generalities.pay');
	})->name('admin.pay');

	Route::get('/admin/configuracion/video', function () {
		return view('pages.admin.generalities.video');
	})->name('admin.video');

	Route::get('/admin/configuracion/banner', function () {
		return view('pages.admin.generalities.banner');
	})->name('admin.banner');

	Route::get('/admin/configuracion/nuestra-empresa', function () {
		return view('pages.admin.generalities.business');
	})->name('admin.business');

	Route::get('/admin/configuracion/popup', function () {
		return view('pages.admin.generalities.popup');
	})->name('admin.popup');
});
