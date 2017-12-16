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

Route::get('/',"homeController@indexPage");
Route::group(['prefix' => '/music'], function() {
    Route::get('/',"homeController@musicPage");
    // Route::get('/man',"homeController@musicPageMan");
    Route::get('/song/{aliasSong}','homeController@detailMusicPage');
    Route::get("/type/{aliasGiong}","homeController@typeMusicPage");
});
Route::get('/dangnhap','homeController@dangnhap');
Route::post('/dangnhap','homeController@postdangnhap')->name('dangnhap');
Route::get('/dangki','homeController@dangki');
Route::post('/dangki','homeController@postdangki')->name('dangki');
Route::get('user','usercontroller@user');
Route::get('logout','usercontroller@logout');
Route::get('toeic','usercontroller@toeic');
Route::get('toeic/pic','usercontroll@toeicpic');
Route::get('toeic/a/{i}','usercontroller@toeica')->name('bta');
Route::post('bta/{i}','usercontroller@postbta');
Route::get('postcomment','usercontroller@postcomment')->name('postcomment');
Route::get('postcommentms','usercontroller@postcommentms')->name('postcommentms');
Route::group(['prefix' => '/video'], function() {
    Route::get('/',"homeController@videoPage");
    Route::get('/type/{alias}',"homeController@typeVideo");
    Route::get('/{alias}',"homeController@detailVideo");
});
Route::group(['prefix'=>"/word"],function(){
	Route::get('/',"homeController@wordPage");
    Route::get('/type/{alias}','homeController@detailWord');
    Route::get('/sendcmm','homeController@sendcmm')->name('sendcmm');
    Route::get('practice/{id}','homeController@practiceWord');
    Route::get('vippractice/{id}','homeController@vippractice');
});
// Route::get('/login',"adminController@getlogin")->name('getlogin');
// Route::post('postlogin',"adminController@postlogin")->name('postlogin');
Route::get('dangxuat',"usercontroller@logout");
Route::group(['prefix'=>"/admin",'middleware'=>'adminlogin'],function(){
    Route::get('/','adminController@index')->name('index');
    Route::get('music','adminController@music')->name('music');
    Route::get('music/edit/{id}','adminController@musicedit');
    Route::get('music/editit/{id}','adminController@musiceditit');
    Route::get('music/editit/name/{id}','adminController@musiceditname');
    Route::post('music/editit/name/{id}','adminController@postname');
    Route::get('music/editit/image/{id}','adminController@musiceditimage');
    Route::post('music/editit/image/{id}','adminController@postimage');
    Route::get('music/editit/type/{id}','adminController@musicedittype');
    Route::post('music/editit/type/{id}','adminController@posttype');
    Route::get('music/editit/lyeng/{id}','adminController@musiceditlyeng');
    Route::post('music/editit/lyeng/{id}','adminController@postlyeng');
    Route::get('music/editit/lyve/{id}','adminController@musiceditlyve');
    Route::post('music/editit/lyve/{id}','adminController@postlyve');
    Route::get('music/editit/video/{id}','adminController@musiceditvideo');
    Route::post('music/editit/video/{id}','adminController@postvideo');
    Route::get('music/editit/tely/{id}','adminController@musicedittely');
    Route::post('music/editit/tely/{id}','adminController@posttely');
    Route::get('music/editit/subEn/{id}','adminController@musiceditsubEn');
    Route::post('music/editit/subEn/{id}','adminController@postsubEn');
    Route::get('music/editit/subVie/{id}','adminController@musiceditsubVie');
    Route::post('music/editit/subVie/{id}','adminController@postsubVie');
    Route::get('singer','adminController@singer');
    Route::get('music/selectsinger/{id}','adminController@selectsinger');
    Route::get('music/editsinger/{id}','adminController@editsinger');
    Route::post('music/editsinger/{id}','adminController@posteditsinger')->name('posteditsinger');
    Route::get('music/deletesinger/{id}','adminController@deletesinger');
    Route::get('singer/add','adminController@singeradd');
    Route::post('addsinger','adminController@addsinger')->name('addsinger');
    Route::get('music/addsong','adminController@musicaddsong');
    Route::get('getcs','adminController@getcs')->name('getcs');
    Route::post('music/addsong2','adminController@musicaddsong2');
    Route::post('music/addsong3','adminController@musicaddsong3');
    Route::post('music/addsong4','adminController@musicaddsong4');
    Route::get('getmore','adminController@getmore')->name('getmore');
    Route::post('music/addsong5','adminController@musicaddsong5');
    Route::post('music/addsong6','adminController@musicaddsong6');
    Route::get('music/upsong','adminController@upsong')->name('upsong');
    //Route::post('music/addsong','adminController@musicaddsongpost')->name('musicaddsong');
    Route::post('music/addsong','admincontroller@pustst1')->name('postsong');
    Route::get('music/makesubtxt','adminController@makesubtxt');
    // 
    Route::get('word','adminController@word')->name('word');;
    Route::get('word/change/{id}','adminController@changeword');
    Route::post('word/change/{id}','adminController@postchangeword')->name('postword');
    Route::get('word/deleteword/{id}','adminController@deleteword');
    Route::get('word/add','adminController@addword');
    Route::post('word/add','adminController@postaddword')->name('postaddword');
    Route::get('ex',"adminController@ex");
    Route::get('ex/edit/{id}','adminController@editex');
    Route::post('ex/edit/{id}','adminController@editexpost');
    Route::get('ex/add','adminController@addex');
    Route::post('ex/add','adminController@addexpost')->name('addex');
    Route::get('ex/addex','adminController@addexz');
    Route::post('ex/addex','adminController@addexzpost')->name('addexz');
    Route::get('comment','adminController@comment');
    Route::get('getallow','adminController@getallow')->name('getallow');
    Route::get('getdelete','adminController@getdelete')->name('getdelete');
});