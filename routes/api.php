<?php

use Illuminate\Http\Request;

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

use App\Article;

Route::group(['middleware' => 'api'], function() {
    Route::get('articles',  function() {
        $articles = Article::all()->take(5);
        return $articles;
    });
    Route::get('articles/show/{id}',  function($id) {
        $article = Article::find($id);
        return $article;
    });
    Route::post('articles/add',  function() {
        $article = new Article();
        $article->title   = request('title');
        $article->content = request('content');
        $article->save();
        return "1";
    });
    //
    Route::get('tasks',  function() {
        $tasks = App\Task::all()->take(5);
        return $tasks;
    });
    Route::get('tasks/show/{id}',  function($id) {
        $task = App\Task::find($id);
        return $task;
    });
    Route::get('tasks/edit/{id}',  function($id) {
        $task = App\Task::find($id);
        return $task;
    });
    Route::post('tasks/add',  function() {
        $task = new App\Task();
        $task->title   = request('title');
        $task->content = request('content');
        $task->save();
        return ['title' => request('title'),'content' => request('content')];
    });
    // /api/tasks/update
    Route::post('tasks/update/{id}',  function($id) {
//        $task = new App\Task();
        $task = App\Book::find($id);
        $task->title   = request('title');
        $task->content = request('content');
        $task->save();
        return ['title' => request('title'),'content' => request('content')];
    });

    Route::get('test',  function() {
        return "#test";
    });

});
//
//Route::group(['middleware' => 'api'], function() {
//    Route::get('articles',  'ArticleController@index');
//});
