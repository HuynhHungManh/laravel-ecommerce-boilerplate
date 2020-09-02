<?php
    Route::group(['namespace' => 'Arabia\Shop\Http\Controllers', 'middleware' => 'api'], function () {
        JsonApi::register('default')->routes(function ($api) {
            $api->post('add-to-cart', 'CartController@addToCart');

            $api->resource('carts');
        });
    });
?>
