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
     * Edit Worker and many functions
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
    Route::get('/create_answer/{quis_id}', 'QuisController@createAnswer');
    Route::get('/save_new_answer', 'QuisController@saveNewAnswer');

    /**
     * Parser
     */
    //Route::get('/scan_sitemap', 'ParserController@scanSitemap');
    Route::get('/parser_index', 'ParserController@index');
    Route::get('/items_list', 'ShopController@itemsList');
    Route::get('/product_card/{id}', 'ShopController@productCard');

    /**
     * Seeder
     */
    Route::get('/test_seeder', 'SeederController@index');
    /**
     * TestController
     */
    Route::get('/test', 'TestController@index');
    Route::get('/find', 'TestController@findPosts');
    Route::get('/addCategory', 'TestController@addCategory');
    Route::get('/saveCategory', 'TestController@saveCategory');
    Route::get('/addPosts', 'TestController@addPosts');
    Route::get('/savePosts', 'TestController@savePosts');
    Route::get('/findCountries', 'TestController@findCountries');
    Route::get('/filter', 'TestController@filterByCountry');
    Route::get('/animals', 'TestController@findKinds');
});
