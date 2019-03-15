<?php

Route::group(['prefix' => 'panel', 'namespace' => 'Panel'], function () {

    Route::any('brands/search', 'BrandController@search')->name('brands.search');//Deve estar sempre acima das rotas resourc, get ...
    Route::resource('brands', 'BrandController');    

    Route::any('planes/search', 'PlaneController@search')->name('planes.search');//Deve estar sempre acima das rotas resourc, get ...
    Route::resource('planes', 'PlaneController');
    
    Route::get('', 'PanelController@index')->name('panel');    
});



Route::get('promocoes', 'Site\SiteController@promotions')->name('promotions');
Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();
