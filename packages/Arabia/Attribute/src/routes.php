<?php
    Route::group(['namespace' => 'Arabia\Attribute\Http\Controllers', 'middleware' => 'api'], function () {
        JsonApi::register('default')->routes(function ($api) {
            $api->resource('attributes')->relationships(function ($relations) {
                $relations->hasMany('attribute_families_attributes');
            });
            $api->resource('attribute-families')->relationships(function ($relations) {
                $relations->hasMany('products');
                $relations->hasMany('attribute_families_attributes');
            });
        });
    });
?>
