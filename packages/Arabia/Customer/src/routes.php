<?php
    Route::group(['namespace' => 'Arabia\Customer\Http\Controllers', 'middleware' => 'api'], function () {
        JsonApi::register('default')->routes(function ($api) {
            // Authentication
            $api->post('customer/register', 'RegistrationController@register');
            $api->post('customer/login', 'SessionController@login');
            $api->get('customer/logout', 'SessionController@logout');

            // Customer Resource
            $api->resource('customers');
            $api->get('customer', 'CustomerController@get');
        });
    });
?>
