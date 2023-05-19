<?php

use App\Models\Acl;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

$acl = Acl::all();

foreach ($acl as $key => $value) {
    $url = $value->url;
    $controller = 'App\Http\Controllers\\' . $value->controller;
    $method = $value->method;

    // Route::get($url, [resolve($controller), $method]);
    // Route::get($url, [app()->make($controller), $method]);

    Route::get($url, function () use ($controller, $method) {
        return app()->call($controller . '@' . $method);
    });
}
