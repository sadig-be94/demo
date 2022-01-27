<?php

use Illuminate\Support\Facades\Route;
Route::get('/linkstorage', function () {
    $exitCode = Artisan::call('storage:link', [] );
    echo $exitCode;
});
