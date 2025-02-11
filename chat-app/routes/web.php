<?php

use Illuminate\Support\Facades\Route;
Route::redirect('/','/chatify');
Route::redirect('/home','/chatify');


Auth::routes();


