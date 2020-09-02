<?php
    Route::group(['namespace' => 'Arabia\Product\Http\Controllers', 'middleware' => 'api'], function () {
        JsonApi::register('default')->routes(function ($api) {
            $api->post('products', 'ProductController@store');
            $api->get('products/{id}', 'ProductController@get');
            $api->resource('products')->relationships(function ($relations) {
                $relations->hasMany('categories');
                $relations->hasOne('attributeFamily');
            })->except('create', 'read');
        });
    });
?>
