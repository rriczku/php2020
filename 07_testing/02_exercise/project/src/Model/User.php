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

    public function __construct(int $id)
    {
        parent::__construct($id);
    }
}
