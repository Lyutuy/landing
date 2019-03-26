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
});*/
/*Route::post('/', function()
{
    return "Форма обработана!";
});*/
Route::group([], function () {

    Route::get('/', 'IndexController@show')->name('home');
    Route::post('/store', 'IndexController@store')->name('store');
    //Route::match(['post','get'], '/', ['uses'=>'IndexController@execute', 'as'=>'/']);
    Route::get('/page/{alias}', ['uses'=>'PageController@execute', 'as'=>'page']);

    Route::auth();
});


//admin/service
/*Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function () {

    //admin
    Route::get('/', function(){

    });

    //admin/pages
    Route::group(['prefix'=>'pages'], function() {

        //admin/pages
        Route::get('/', ['uses'=>'PagesController@execute', 'as'=>'pages']);

        //admin/pages/add
        Route::match(['get','post'], '/add', ['uses'=>'PagesAddController@execute', 'as'=>'pagesAdd']);

        //admin/edit/{2}
        Route::match(['get', 'post', 'delete'], '/edit/{page}', ['uses'=>'PagesEditController@execute', 'as'=>'pagesEdit']);
    });

    //admin/portfolio
    Route::group(['prefix'=>'portfolio'], function() {

        //admin/portfolio
        Route::get('/', ['uses'=>'PortfolioController@execute', 'as'=>'portfolio']);

        //admin/portfolio/add
        Route::match(['get','post'], '/add', ['uses'=>'PortfolioAddController@execute', 'as'=>'portfolioAdd']);

        //admin/edit/{2}
        Route::match(['get', 'post', 'delete'], '/edit/{portfolio}', ['uses'=>'PortfolioEditController@execute', 'as'=>'portfolioEdit']);
    });

    //admin/services
    Route::group(['prefix'=>'services'], function() {

        //admin/services
        Route::get('/', ['uses'=>'ServiceController@execute', 'as'=>'services']);

        //admin/services/add
        Route::match(['get','post'], '/add', ['uses'=>'ServiceAddController@execute', 'as'=>'serviceAdd']);

        //admin/edit/{2}
        Route::match(['get', 'post', 'delete'], '/edit/{service}', ['uses'=>'ServicesEditController@execute', 'as'=>'serviceEdit']);
    });*/
//});
