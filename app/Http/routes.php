<?php
use Illuminate\Http\Request;
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
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/admin', function(){
// 	return view('admin');
// });
// Route::post('/story', 'AdminController@storeStory');
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
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    //go to pages
    Route::get('admin', ['as' =>'admin', 'uses' => 'AdminController@index']);
    
	Route::get('/', ['as' => '/', 'uses' => 'HomeController@index']);

	Route::get('story', ['as' => 'story.index', 'uses' => 'StoryController@index']);

	Route::get('story/show/{id}', ['as' => 'story.show', 'uses' => 'StoryController@show']);

	Route::get('story/{id}/edit', ['as' => 'story.edit', 'uses' => 'AdminController@editStory']);

	Route::get('news', ['as' => 'news.index', 'uses' => 'NewsController@index']);

	Route::get('news/add', ['as' => 'news.add', 'uses' => 'AdminController@news']);

	Route::get('news/show/{id}', ['as' => 'news.show', 'uses' => 'NewsController@show']);

	Route::get('news/{id}/edit', ['as' => 'news.edit', 'uses' => 'AdminController@editNews']);

	// Route::get('img', ['as' => '/kcfinder/browse.php?opener=ckeditor&type=images', 'uses' => 'AdminController@img']);

	//update stuff
	Route::patch('story/{id}/update', ['as' => 'story.update', 'uses' => 'AdminController@updateStory']);

	Route::get('story/{id}/restore', ['as' => 'story.restore', 'uses' => 'AdminController@restoreStory']);

	Route::patch('news/{id}/update', ['as' => 'news.update', 'uses' => 'AdminController@updateNews']);

	Route::get('news/{id}/restore', ['as' => 'news.restore', 'uses' => 'AdminController@restoreNews']);

	//post stuff
	Route::post('story', 'AdminController@storeStory');

	Route::post('news', 'AdminController@storeNews');

	//soft delete stuff
	Route::delete('story/{id}/delete', ['as' => 'story.delete', 'uses' => 'AdminController@deleteStory']);

	Route::delete('news/{id}/delete', ['as' => 'news.delete', 'uses' => 'AdminController@deleteNews']);

});