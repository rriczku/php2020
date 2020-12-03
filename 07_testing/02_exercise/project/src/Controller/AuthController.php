<?php

namespace Controller;

use Model\User;

class AuthController extends Controller
{
    public $errors=[];
    public $correct=true;
    public $database;
    public function register()
{

    if(empty($_POST['id']))
    {
        $this->correct=false;
        array_push($this->errors,"The id filed cannot be empty");
    }
    if(empty($_POST['name']))
    {
        $this->correct=false;
        array_push($this->errors,"The name filed cannot be empty");
    }
    if(empty($_POST['surname']))
    {
        $this->correct=false;
        array_push($this->errors,"The surname filed cannot be empty");
    }
    if(empty($_POST['email']))
    {
        $this->correct=false;
        array_push($this->errors,"The email filed cannot be empty");
    }if(empty($_POST['password']))
    {
        $this->correct=false;array_push($this->errors,"The password filed cannot be empty");
    }if(empty($_POST['password_confirmation']))
    {
        $this->correct=false;
        array_push($this->errors,"The password confirmation filed cannot be empty");
    }
    if($_POST['password']!=$_POST['password_confirmation'])
    {
        $this->correct=false;
        array_push($this->errors,"The password confirmation filed does not match the password field");
    }
    if($this->correct)
    {
        $this->database = $this->storage();
        $user = new User($_POST['id']);
        $user->name=$_POST['name'];
        $user->surname=$_POST['surname'];
        $user->email=$_POST['email'];
        $user->password=password_hash($_POST['password'],PASSWORD_DEFAULT);
        $user->confirmed=false;
        $user->token=md5(uniqid(rand(),true));
        $this->database->store($user);
        header('Location: confirmation_notice');
    } else
    {
        foreach($this->errors as $e)
        {
            echo "<li class='error'>$e</li>";
        }
    }


    return ["auth.register.index", ["title" => "Register"]];
}


    public function login()
    {
        return ["auth.login.index", ["title" => "Login"]];
    }
    public function confirmation_notice()
    {
        return ["auth.confirmation_notice.index",["title"=>"Confirmation notice"]];
    }
}