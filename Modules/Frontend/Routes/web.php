<?php


    Route::get('/', 'FrontendController@index')->name('index');
    Route::get('/single-blog/{slug}', 'FrontendController@blog')->name('single-blog');

