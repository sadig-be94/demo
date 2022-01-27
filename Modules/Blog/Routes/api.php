<?php

use Illuminate\Http\Request;

use Modules\Blog\Http\Controllers\BlogController as Blog;

Route::put('/blog/store', [Blog::class, 'apiCreate']);
