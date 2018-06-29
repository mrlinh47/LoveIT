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

/*Route::get('/', function () {
    return view('welcome');
});
*/
/*Route::get('test1', function(){
	return view('admin.category.add');
});*/
/*Route::get('admin', ['as'=> 'admin', function(){
	return view('admin.dashboard.main');
}]);*/
//login
Route::get('login',['as'=>'login','uses'=>'LoginController@getLogin']);
Route::post('login',['as'=>'postLogin','uses'=>'LoginController@postLogin']);
Route::get('logout',['as'=>'getLogout','uses'=>'LoginController@getLogout']);
//admin
/*Route::get('admin', ['as'=> 'admin','middleware'=> 'auth', function(){
	return view('admin.dashboard.main');
}]);*/

Route::group(['middleware'=>'auth'], function(){
	Route::group(['prefix'=>'ad_mrlinh','namespace' => 'Admin'], function(){ //'namespace' => 'Admin: ControllerName chuyen qua Admin
		Route::get('/', function(){
			return view('admin.module.dashboard.main');
	
		});
	
	//cate
	Route::group(['prefix'=>'category'], function(){
		Route::get('add',['as'=>'getCateAdd','uses'=>'CateController@getCateAdd']);
		Route::post('add',['as'=>'postCateAdd','uses'=>'CateController@postCateAdd']);
		Route::get('list',['as'=>'getCateList','uses'=>'CateController@getCateList']);
		//delete
		Route::get('delete/{id}',['as'=>'getCateDelete','uses'=>'CateController@getCateDelete'])->where('id','[0-9]+');
		//edit
		Route::get('edit/{id}',['as'=>'getCateEdit','uses'=>'CateController@getCateEdit'])->where('id','[0-9]+');
		Route::post('edit/{id}',['as'=>'postCateEdit','uses'=>'CateController@postCateEdit'])->where('id','[0-9]+');

		Route::get('edit-status-cate/{id}', ['as' => 'editPubishsCate', 'uses' => 'CateController@editPubishsCate']);
	});

	//News
	Route::group(['prefix'=>'news'], function(){
		Route::get('add',['as'=>'getNewsAdd','uses'=>'NewsController@getNewsAdd']);
		Route::post('add',['as'=>'postNewsAdd','uses'=>'NewsController@postNewsAdd']);
		Route::get('list',['as'=>'getNewsList','uses'=>'NewsController@getNewsList']);
		// delete
		Route::get('delete/{id}',['as'=>'getNewsDelete','uses'=>'NewsController@getNewsDelete'])->where('id','[0-9]+');
		//edit
		 Route::get('edit/{id}',['as'=>'getNewsEdit','uses'=>'NewsController@getNewsEdit'])->where('id','[0-9]+');
		 Route::post('edit/{id}',['as'=>'postNewsEdit','uses'=>'NewsController@postNewsEdit'])->where('id','[0-9]+');

		 Route::get('edit-status-news/{id}', ['as' => 'editStatusNews', 'uses' => 'NewsController@editStatusNews']);

	});
	//user
	Route::group(['prefix' => 'user'], function(){
			Route::get('add', ['as' => 'getAdd', 'uses' => 'UserController@getAdd']);
			Route::post('add', ['as' => 'postAdd', 'uses' => 'UserController@postAdd']);
			//edit
			Route::get('edit/{id}', ['as' => 'getEdit', 'uses' => 'UserController@getEdit'])->where('id', '[0-9]+');
			Route::post('edit/{id}', ['as' => 'postEdit', 'uses' => 'UserController@postEdit'])->where('id', '[0-9]+');

			Route::get('edit-status/{id}', ['as' => 'editStatus', 'uses' => 'UserController@editStatus']);
			//delete
			Route::get('delete/{id}', ['as' => 'delete', 'uses' => 'UserController@getDelete'])->where('id', '[0-9]+');
			//list
			Route::get('list', ['as' => 'getListUser', 'uses' => 'UserController@getListUser']);
		});
	});
});


