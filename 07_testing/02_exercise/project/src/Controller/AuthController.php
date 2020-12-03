<?php

namespace Controller;

use Model\User;

class AuthController extends Controller
{
    public function register()
{
    return ["register.index", ["title" => "Register"]];
}
    public function login()
    {
        return ["login.index", ["title" => "Login"]];
    }
}