<?php

Route::group(['middleware' => 'web', 'prefix' => 'careproviders', 'namespace' => 'Modules\CareProviders\Http\Controllers'], function()
{
    Route::get('/', 'CareProvidersController@index');
});
