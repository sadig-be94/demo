<?php


Route::prefix('core')->group(function() {
    Route::get('/', 'CoreController@index');
});
