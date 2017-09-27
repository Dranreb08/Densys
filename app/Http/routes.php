<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');

    Route::get('/tasks', 'TaskController@index');
    Route::post('/task', 'TaskController@store');
    Route::delete('/task/delete/{task}', 'TaskController@destroy');
	Route::any('/task/edit/{task}', 'TaskController@update');
	

	Route::get('/patients', 'PatientController@index');
    Route::post('/patient', 'PatientController@store');
    Route::get('/patient/search/{patient}', 'PatientController@search');
    Route::any('/patient/edit/{patient}', 'PatientController@update');
    Route::delete('/patient/delete/{patient}', 'PatientController@destroy');

    Route::post('/dental_history', 'PatientDentalHistoryController@store');
    Route::any('/dental_history/{patient}', 'PatientDentalHistoryController@update');

    Route::get('sendbasicemail','MailController@basic_email');
    Route::get('sendhtmlemail','MailController@html_email');
    Route::get('sendattachmentemail','MailController@attachment_email');

    Route::get('/uploadfile','UploadFileController@index');
    Route::post('/uploadfile','UploadFileController@showUploadFile');
    Route::auth();

});
