<?php

namespace Model;

use Concept\Distinguishable;

class User extends Distinguishable
{
    public $name;
    public $surname;
    public $email;
    public $password;
    public $confirmed;
    public $token;

    public function __construct($id)
    {
        parent::__construct($id);
    }
}
