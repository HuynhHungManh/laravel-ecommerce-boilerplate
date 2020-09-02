<?php
    Route::group(['namespace' => 'Arabia\Category\Http\Controllers', 'middleware' => 'api'], function () {
        JsonApi::register('default')->routes(function ($api) {
            $api->resource('categories')->relationships(function ($relations) {
                $relations->hasMany('products');
                $relations->hasMany('attributes');
            });
        });
    });
?>
