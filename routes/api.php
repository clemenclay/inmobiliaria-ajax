<?php

Route::group(['prefix' => '/v1', 'middleware' => ['auth:api'], 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::post('change-password', 'ChangePasswordController@changePassword')->name('auth.change_password');
    Route::apiResource('rules', 'RulesController', ['only' => ['index']]);
    Route::apiResource('permissions', 'PermissionsController');
    Route::apiResource('roles', 'RolesController');
    Route::apiResource('users', 'UsersController');
    Route::apiResource('contact-companies', 'ContactCompaniesController');
    Route::apiResource('contacts', 'ContactsController');
    Route::apiResource('propiedades', 'PropiedadesController');
    Route::apiResource('monedas', 'MonedasController');
    Route::apiResource('tipooperacions', 'TipooperacionsController');
    Route::apiResource('barrios', 'BarriosController');
});
