<?php

/**
 * @apiGroup           Users
 * @apiName            getAuthenticatedUser
 *
 * @api                {GET} /v1/user/profile Find Logged in User data (Profile Information)
 * @apiDescription     Find the user details of the logged in user from its Token. (without specifying his ID)
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiUse             UserSuccessSingleResponse
 */

use App\Containers\User\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('user/profile', [Controller::class, 'getAuthenticatedUser'])
    ->name('api_user_get_authenticated_user')
    ->middleware(['auth:api']);
