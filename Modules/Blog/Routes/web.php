<?php

    Route::resource('/blog', 'BlogController')->middleware('admin');

