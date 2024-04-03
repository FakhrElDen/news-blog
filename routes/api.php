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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/newsDetails/{id}', 'NewsController@NewsDetails');
Route::get('/getImportantNews', 'NewsController@GetImportantNews');
Route::get('/relatedNews/{id}', 'NewsController@RelatedNews');
Route::get('/similarNews/{id}', 'NewsController@SimilarNews');
Route::get('/newsSameTag/{tag}', 'NewsController@NewsSameTag');
Route::get('/getLatestNews', 'NewsController@GetLatestNews');

Route::get('/listCategory', 'NewsController@ListCategory');
Route::get('/categoriesAndNews', 'NewsController@CategoriesAndNews');

Route::get('/relatedAds/{id}', 'NewsController@RelatedAds');