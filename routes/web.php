<?php

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
    // return view('auth.login');
    return redirect('mainpage');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mainpage','MainpageController@fetchArticles');
Route::get('/articleview/{id}','MainpageController@viewArticle');
// Route::get('/menu','MenuController@index');
Route::get('/fetchchoosenSourceArticles','SearchForArticleController@showSource_content');
// Route::get('/view/{source}','MenuController@fetchchoosenArticle');
Route::get('/Nextpage','MainpageController@fetchArticles');
// Route::get('/auth.login','loginController@login');
Route::get('/fetchArticle','SearchForArticleController@search_article');
// Route::get('view/{source}','SearchForArticleController@showSource_content');
Route::get('/show_source','SearchForArticleController@showSource_content');