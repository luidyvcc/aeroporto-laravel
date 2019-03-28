<?php

// Setor administrativo
Route::group(['prefix' => 'panel', 'namespace' => 'Panel'], function () {
    // Marcas
    Route::any('brands/search', 'BrandController@search')->name('brands.search');//Deve estar sempre acima das rotas resourc, get ...
    Route::get('brands/{id}/planes', 'BrandController@planes')->name('brands.planes');
    Route::resource('brands', 'BrandController');    

    // Aviões
    Route::any('planes/search', 'PlaneController@search')->name('planes.search');//Deve estar sempre acima das rotas resourc, get ...
    Route::resource('planes', 'PlaneController');
    
    // Estados
    Route::get('states/index', 'StateController@index')->name('states.index');
    Route::any('states/search', 'StateController@search')->name('states.search');

    // Principal
    Route::get('/', 'PanelController@index')->name('panel');     
});


// Site
Route::get('promocoes', 'Site\SiteController@promotions')->name('promotions');
Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();
