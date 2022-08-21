<?php


use Illuminate\Support\Facades\Route;

Route::get('api/v1/manassa/status-changed/{account}',[config('nova-manassa-sdk.manassa_status_change_controller_class'),
    config('nova-manassa-sdk.manassa_status_change_controller_method')]);
