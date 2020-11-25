<?php

namespace Storage;

use Concept\Distinguishable;
use Predis\Client;

class RedisStorage implements Storage
{

    private Client $predis;

    public function __construct(){
        $this->predis=new Client();
    }

    public function store(Distinguishable $distinguishable) : void
    {
        $this->predis->set($distinguishable->key(),serialize($distinguishable));
    }

    public function loadAll(): array
    {
        $keys=$this->predis->keys('*');
        $result=[];

        foreach($keys as $key)
        {
            $result[]=unserialize($this->predis->get($key));
        }
        return $result;
    }
}