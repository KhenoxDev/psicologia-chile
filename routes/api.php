<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('throttle:60,1')->group(function () {
	Route::get('news/{id?}', 'NewsController@getNews')->name('api.news');
	Route::get('questions/{order?}', 'FrequentlyQuestionController@getQuestions')->name('api.questions');
	Route::get('generalities/', 'GeneralityController@getGeneralities')->name('api.generalities');
	Route::get('logos/', 'LogoController@getLogos')->name('api.logos');
	Route::get('payments/', 'PaymentMethodController@getPayments')->name('api.payments');
	Route::get('socials/', 'SocialController@getSocials')->name('api.socials');
});
