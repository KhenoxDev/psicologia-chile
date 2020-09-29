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

	Route::get('/politica-de-privacidad-y-cookies', 'PrivacyController@getPrivacy')->name('privacy');
});

/* Admin Routes */

Route::get('/admin/inicio', 'AuthController@index')->name('admin.form.login');
Route::post('/admin/iniciar', 'AuthController@postLogin')->name('admin.login');
Route::get('/admin/salir', 'AuthController@logout')->name('admin.logout');

Route::group(['middleware' => ['auth']], function () {

	/* Home */
	Route::get('/admin', function () {
		return view('pages.admin.home');
	})->name('admin.home');

	/* Users */
	Route::get('/admin/usuarios', function () {
		return view('pages.admin.users');
	})->name('admin.users');
	Route::get('/admin/usuarios', 'UserController@index')->name('admin.users');
	Route::post('/admin/usuarios', 'UserController@store')->name('admin.store.users');
	Route::get('/admin/usuarios/editar', 'UserController@edit')->name('admin.edit.users');
	Route::put('/admin/usuarios/editar', 'UserController@update')->name('admin.update.users');
	Route::get('/admin/usuarios/activar/{id}', 'UserController@active')->name('admin.active.users');
	Route::get('/admin/usuarios/desactivar/{id}', 'UserController@inactive')->name('admin.inactive.users');
	Route::put('/admin/usuarios/editar-password', 'UserController@update_password')->name('admin.update_password.users');

	/* Agreemnets */
	Route::get('/admin/convenios', function () {
		return view('pages.admin.agreements');
	})->name('admin.agreements');
	Route::get('/admin/convenios', 'AgreementController@index')->name('admin.agreements');
	Route::post('/admin/convenios', 'AgreementController@store')->name('admin.store.agreements');
	Route::get('/admin/convenios/eliminar/{id}', 'AgreementController@destroy')->name('admin.destroy.agreements');


	/* News */
	Route::get('/admin/noticias/subir', 'AuthorController@getAuthors')->name('admin.news');
	Route::post('/admin/noticias', 'NewsController@store')->name('admin.store.news');
	Route::get('/admin/noticias/publicadas', 'NewsController@getNewsPublished')->name('admin.publish.news');
	Route::get('/admin/noticias/sin-publicar', 'NewsController@getNewsUnpublished')->name('admin.unpublish.news');
	Route::get('/admin/noticias/publicar/{id}', 'NewsController@newsPublished')->name('admin.published.news');
	Route::get('/admin/noticias/quitar/{id}', 'NewsController@newsUnpublished')->name('admin.unpublished.news');
	Route::get('/admin/noticias/eliminar/{id}', 'NewsController@newsDestroy')->name('admin.destroy.news');
	Route::get('/admin/noticias/subir/{id}', 'NewsController@edit')->name('admin.edit.news');
	Route::put('/admin/noticias/update', 'NewsController@update')->name('admin.update.news');

	/* Authors */
	Route::post('/admin/noticias/autor', 'AuthorController@store')->name('admin.store.author');


	/* Frequently questions */
	Route::get('/admin/consultas-frecuentes', function () {
		return view('pages.admin.questions');
	})->name('admin.questions');
	Route::get('/admin/consultas-frecuentes', 'FrequentlyQuestionController@index')->name('admin.questions');
	Route::post('/admin/consultas-frecuentes', 'FrequentlyQuestionController@store')->name('admin.store.questions');
	Route::get('/admin/consultas-frecuentes/editar', 'FrequentlyQuestionController@edit')->name('admin.edit.questions');
	Route::put('/admin/consultas-frecuentes/actualizar', 'FrequentlyQuestionController@update')->name('admin.update.questions');
	Route::get('/admin/consultas-frecuentes/eliminar/{id}', 'FrequentlyQuestionController@delete')->name('admin.delete.questions');

	/* Logos */
	Route::get('/admin/logo', 'LogoController@index')->name('admin.logo');
	Route::post('/admin/logo/guardar', 'LogoController@uploadLogo')->name('admin.store.logo');
	Route::get('/admin/logo/defecto/{id}', 'LogoController@activeLogo')->name('admin.default.logo');
	Route::get('/admin/logo/baja/{id}', 'LogoController@inactiveLogo')->name('admin.down.logo');
	Route::get('/admin/logo/eliminar/{id}', 'LogoController@deleteLogo')->name('admin.destroy.logo');

	/* Social Networks */
	Route::get('/admin/redes-sociales', 'SocialController@index')->name('admin.social');
	Route::post('/admin/redes-sociales/guardar', 'SocialController@store')->name('admin.store.social');
	Route::get('/admin/redes-sociales/eliminar/{id}', 'SocialController@destroy')->name('admin.destroy.social');
	Route::get('/admin/redes-sociales/editar', 'SocialController@edit')->name('admin.edit.social');
	Route::put('/admin/redes-sociales/actualizar', 'SocialController@update')->name('admin.update.social');

	/* Payment methods */
	Route::get('/admin/metodos-pago', 'PaymentMethodController@index')->name('admin.pay');
	Route::post('/admin/metodos-pago/guardar', 'PaymentMethodController@store')->name('admin.store.pay');
	Route::get('/admin/metodos-pago/eliminar/{id}', 'PaymentMethodController@destroy')->name('admin.destroy.pay');

	/* Main video */
	Route::get('/admin/video', 'GeneralityController@getMainVideo')->name('admin.video');
	Route::post('/admin/video/guardar', 'GeneralityController@setMainVideo')->name('admin.store.video');
	Route::get('/admin/video/defecto/{id}', 'GeneralityController@setDefaultVideo')->name('admin.default.video');
	Route::get('/admin/video/eliminar/{id}', 'GeneralityController@destroyMainVideo')->name('admin.destroy.video');

	/* Main banner */
	Route::get('/admin/banner', 'GeneralityController@getMainBanner')->name('admin.banner');
	Route::post('/admin/banner/guardar', 'GeneralityController@setMainBanner')->name('admin.store.banner');
	Route::get('/admin/banner/defecto/{id}', 'GeneralityController@setDefaultBanner')->name('admin.default.banner');
	Route::get('/admin/banner/eliminar/{id}', 'GeneralityController@destroyMainBanner')->name('admin.destroy.banner');

	/* Pop up */
	Route::get('/admin/popup', 'GeneralityController@getMainPopup')->name('admin.popup');
	Route::post('/admin/popup/guardar', 'GeneralityController@setMainPopup')->name('admin.store.popup');
	Route::get('/admin/popup/defecto/{id}', 'GeneralityController@setDefaultPopup')->name('admin.default.popup');
	Route::get('/admin/popup/baja/{id}', 'GeneralityController@unsetDefaultPopup')->name('admin.unset.popup');
	Route::get('/admin/popup/eliminar/{id}', 'GeneralityController@destroyMainPopup')->name('admin.destroy.popup');

	/* Own Business */
	Route::get('/admin/nuestra-empresa', 'GeneralityController@getBusinessInfo')->name('admin.business');
	Route::post('/admin/nuestra-empresa/guardar', 'GeneralityController@setBusinessInfo')->name('admin.store.business');
	Route::get('/admin/nuestra-empresa/editar', 'GeneralityController@editBusinessInfo')->name('admin.edit.business');
	Route::put('/admin/nuestra-empresa/actualizar', 'GeneralityController@updateBusinessInfo')->name('admin.update.business');
	Route::get('/admin/nuestra-empresa/eliminar/{id}', 'GeneralityController@destroyBusinessInfo')->name('admin.destroy.business');

	/* Documentation */
	Route::get('/admin/documentos', 'DocumentController@index')->name('admin.document');
	Route::post('/admin/documentos/subir', 'DocumentController@store')->name('admin.store.document');
	Route::get('/admin/documentos/descargar/{id}', 'DocumentController@download')->name('admin.download.document');
	Route::get('/admin/documentos/eliminar/{id}', 'DocumentController@destroy')->name('admin.destroy.document');

	/* Privacy policies */
	Route::get('/admin/politicas-privacidad', 'PrivacyController@index')->name('admin.privacy');
	Route::post('/admin/politicas-privacidad/subir', 'PrivacyController@store')->name('admin.store.privacy');
	Route::put('/admin/politicas-privacidad/actualizar', 'PrivacyController@update')->name('admin.update.privacy');
	Route::get('/admin/politicas-privacidad/eliminar/{id}', 'PrivacyController@destroy')->name('admin.destroy.privacy');
});

Route::get("/send-email", "EmailController@sendEmailToUser");
Route::get("/mail", function () {
	return view('email.newsletter-mail');
});
/* Mailing */
Route::post("/trabaja-con-nosotros", "EmailController@sendMailWorksWithUs")->name("mailing.workus");
