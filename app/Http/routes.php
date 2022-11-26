<?php

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

use App\Worker;
use App\Age;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {
    /**
     * Show WorkerOld Dashboard
     */
    Route::get('/', 'WorkerController@index');

    /**
     * Add New WorkerOld
     */
    Route::post('/worker', 'WorkerController@saveWorker');
    /**
     * Add New WorkerOld
     */
    Route::post('/store', 'WorkerController@store');

    /**
     * Delete WorkerOld
     */
    Route::delete('/worker/{id}', 'WorkerController@deleteWorker');

    /**
     * Edit Worker
     */
    Route::get('/edit/{id}', 'WorkerController@editWorker');
    Route::get('/test', 'WorkerController@test');
    Route::get('/raspisanie', 'WorkerController@rasp');
    Route::get('/quis', 'QuisController@index');
    Route::get('/quis/{id}', 'QuisController@showQuis');
    Route::get('/save', 'QuisController@saveResult');
    Route::get('/save_quis', 'QuisController@saveQuis');
    Route::get('/edit_quis/{id}', 'QuisController@editQuis');
    Route::get('/edit_questions/{id}', 'QuisController@editQuest');
    Route::get('/save_questions', 'QuisController@saveQuest');
    Route::get('/edit_answers/{id}', 'QuisController@editAnswers');
    Route::get('/save_answers/{id}', 'QuisController@saveAnswers');
    Route::get('/create_quis', 'QuisController@createQuis');
    Route::get('/save_new_quis', 'QuisController@saveNewQuis');
    Route::get('/create_quest/{quis_id}', 'QuisController@createQuest');
    Route::get('/save_new_quest', 'QuisController@saveNewQuest');
});
