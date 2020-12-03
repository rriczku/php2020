<?php

namespace Model;

use Concept\Distinguishable;

class User extends Distinguishable
{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $password;
    public function __construct(int $id)
    {
        parent::__construct($id);
    }
}
