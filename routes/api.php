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


//VacanciesController
Route::post('/vacancies/create', 'App\Http\Controllers\VacanciesController@create');
Route::get('/vacancies/{id}', 'App\Http\Controllers\VacanciesController@show');
Route::get('/vacancies', 'App\Http\Controllers\VacanciesController@index');

//TestsController
Route::post('/tests/create', 'App\Http\Controllers\TestsController@create');
Route::get('/tests/{id}', 'App\Http\Controllers\TestsController@show');
Route::get('/tests', 'App\Http\Controllers\TestsController@index');

//QuestionsController
Route::post('/question/create', 'App\Http\Controllers\QuestionsController@create');
Route::get('/question/{id}', 'App\Http\Controllers\QuestionsController@show');
Route::get('/question', 'App\Http\Controllers\QuestionsController@index');

//QuestionsController
Route::post('/unique_test/create', 'App\Http\Controllers\UniqueTestsController@create');
Route::put('/unique_test/{id}', 'App\Http\Controllers\UniqueTestsController@update');
Route::get('/unique_test/{id}', 'App\Http\Controllers\UniqueTestsController@show');


//ResultController
Route::post('/results/create', 'App\Http\Controllers\ResultController@create');
Route::put('/results/{id}', 'App\Http\Controllers\ResultController@update');
Route::get('/results/{id}', 'App\Http\Controllers\ResultController@show');
Route::get('/results', 'App\Http\Controllers\ResultController@index');



//verification test
//verification testing
Route::get('/verification_testing/{name}', 'App\Http\Controllers\QuestionsController@index');


Route::post('login', 'App\Http\Controllers\AuthController@login');


Route::get('test', function(){
    return array(
        array('text' => 'Ответ', 'is_correct' => true),
        array('text' => 'Ответ', 'is_correct' => true),
        array('login'=> 'admin', 'password'=>password_hash('password',PASSWORD_DEFAULT))
    );
});