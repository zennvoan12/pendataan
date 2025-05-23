<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index'
    ,[
        'title' => 'Home'
    ]
);
});

Route::get('/about', function () {
    return view('About'
    ,[
        'title' => 'About'
    ]);
});

Route::get('/blog', function () {
    return view('Blog'
    ,[
        'title' => 'Blog'
    ]);
});

Route::get('/blog-details', function () {
    return view('blog-details');
});
