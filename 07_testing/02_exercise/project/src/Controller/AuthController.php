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
        $this->correct=false;
        array_push($this->errors,"The password filed cannot be empty");
    }if(empty($_POST['password_confirmation'])&&isset($_POST['password_confirmation']))
    {
        $this->correct=false;
        array_push($this->errors,"The password confirmation filed cannot be empty");
    }
    if(isset($_POST['password'])&&isset($_POST['password_confirmation'])&&$_POST['password']!=$_POST['password_confirmation']&&!empty($_POST['password'])&&!empty($_POST['password_confirmation']))
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
    } else if(isset($_POST['id']))
    {
        foreach($this->errors as $e)
        {
            echo "<li class='error'>$e</li>";
        }
    }


    return ["auth.register.index", ["title" => "Register"]];
}

    public function confirm()
    {
        $hash=$_SERVER['PHP_SELF'];
        $link=explode('/',$hash);
        $hashfromlink=end($link);

        $this->database=$this->storage();
        $users=$this->database->loadAll();
        foreach($users as $user)
        {
           if($user->token==$hashfromlink)
           {
                $_SESSION['goodtoken']=true;
                 $user->confirmed=true;
                 $user->token=null;
                 $this->database->store($user);
                header("Location: /");

                exit();

           }
        }
        $_SESSION['goodtoken']=false;
        header("Location: /");
        exit();

    }

    public function login()
    {
        if(isset($_POST['email'])) {
            $emailPost = $_POST['email'];
            $passwordPost=$_POST['password'];
            $this->database = $this->storage();
            $users = $this->database->loadAll();
            $emailExists = false;
            $isconfirmed=false;
            $passwordCorrect=false;
            $username=null;
            foreach ($users as $user)
            {
                if ($user->email == $emailPost) {
                    $emailExists = true;
                    $username=$user->name;
                }
                if(password_verify($passwordPost,$user->password))
                {
                    $passwordCorrect=true;
                }
                if($user->confirmed==false&&$passwordCorrect&&$emailExists)
                {
                        header("Location: /auth/confirmation_notice");
                        exit();
                }
            }


            if($emailExists == false) {
                $_SESSION['nomailfound'] = "Email '$emailPost' does not exist!";
                header("Location: /");
                exit();
            }
            if($passwordCorrect==false)
            {
                $_SESSION['incorectpassword']=true;
            }
            if($passwordCorrect)
            {
                $_SESSION['logged']="$username";
                header("Location: /");
                exit();
            }

            return ["auth.login.index", ["title" => "Login"]];
        }
        return ["auth.login.index", ["title" => "Login"]];
    }
    public function logout()
    {
        unset($_SESSION['logged']);
        $_SESSION['logout']=true;
        header("Location: /");
        exit();
    }
    public function confirmation_notice()
    {
        return ["auth.confirmation_notice.index",["title"=>"Confirmation notice"]];
    }

}