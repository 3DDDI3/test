<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $reqest) {
    if (!$reqest->user())
        Auth::attempt(['email' => 'test@test.ru', 'password' => '1234']);

    return view('welcome');
});
