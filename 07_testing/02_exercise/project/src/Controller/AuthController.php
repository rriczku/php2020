<?php

namespace Controller;

use Model\User;

class AuthController extends Controller
{

    public $database;
    public function register()
{
    if(isset($_POST['id'])&&isset($_POST['name'])&&isset($_POST['surname'])&&isset($_POST['password'])&&isset($_POST['email'])) {
        $this->database = $this->storage();
        $user = new User($_POST['id']);
        $user->name=$_POST['name'];
        $user->surname=$_POST['surname'];
        $user->email=$_POST['email'];
        $user->password=password_hash($_POST['password'],PASSWORD_DEFAULT);
        $user->confirmed=false;
        $this->database->store($user);
    }
    return ["auth.register.index", ["title" => "Register"]];
}


    public function login()
    {
        return ["auth.login.index", ["title" => "Login"]];
    }
}