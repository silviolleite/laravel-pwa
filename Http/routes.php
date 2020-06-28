<?php

Route::group(['as' => 'laravelpwa.'], function()
{
    Route::get('/manifest', 'LaravelPWAController@manifestJson')
    ->name('manifest');
    Route::get('/offline/', 'LaravelPWAController@offline');
});
