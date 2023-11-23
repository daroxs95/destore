<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Auth\AuthenticatedSessionController;

class AuthenticatedSessionControllerAPI extends AuthenticatedSessionController
{
    const API = true;
}
