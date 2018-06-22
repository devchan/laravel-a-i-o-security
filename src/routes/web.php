<?php
Route::get('contact', function () {
    return 'contact';
}

);


Route::group(['middleware' => ['web'], 'namespace' => 'Devchan\LaravelAIOSecurity\Http\Controllers'], function () {
    Route::get('password/expired', 'ExpiredPasswordController@expired')
        ->name('password.expired');
    Route::post('password/post_expired', 'ExpiredPasswordController@postExpired')
        ->name('password.post_expired');
});


