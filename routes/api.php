<?php


use Illuminate\Support\Facades\Route;

Route::post('api/v1/manassa/status-changed',[config('nova-manassa-sdk.manassa_status_change_controller_class'),
    config('nova-manassa-sdk.manassa_status_change_controller_method')]);
