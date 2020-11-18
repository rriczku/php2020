<?php

namespace Storage;

use Concept\Distinguishable;

class SessionStorage implements Storage
{
    public function __construct()
    {
        session_start();
        $_SESSION['widgets']=array();
    }

    public function store(Distinguishable $distinguishable) : void
    {
        array_push($_SESSION['widgets'],serialize($distinguishable));
    }

    public function loadAll(): array
    {
        $result=[];
        foreach($_SESSION['widgets'] as $a)
        {
            array_push($result,unserialize($a));
        }
        return $result;
    }
}