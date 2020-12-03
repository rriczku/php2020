<?php

namespace String;

use function GuzzleHttp\Psr7\str;

class Editor
{
    private $mystring;
    
    public function __construct($par)
    {
        $this->mystring=$par;
    }
    public function get()
    {
        return $this->mystring;
    }

    public function lower()
    {
        $this->mystring=strtolower($this->mystring);
        return $this;
    }

    public function upper()
    {
        $this->mystring=strtoupper($this->mystring);
        return $this;
    }

    public function replace(string $string, string $string1)
    {
        $this->mystring=str_replace($string,$string1,$this->mystring);
        return $this;
    }

    public function censor(string $string)
    {
        $censored=str_repeat('*',strlen($string));
        $this->mystring=str_replace($string,$censored,$this->mystring);
        return $this;
    }

    public function repeat(string $string, int $int)
    {
        $res=str_repeat($string,$int);
        $this->mystring=str_replace($string, $res,$this->mystring);
        return $this;
    }

    public function remove(string $string)
    {
        $this->mystring=str_replace($string,"",$this->mystring);
        return $this;
    }
}
