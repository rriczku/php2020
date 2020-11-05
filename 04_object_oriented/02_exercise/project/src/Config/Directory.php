<?php

namespace Config;

class Directory
{
    public static $root;
    public static function set($r)
    {
       	Directory::$root=$r;
    }
    public static function root()
    {
        return Directory::$root;
    }
    public static function storage()
    {
        $storage ="../storage/";
        return $storage;
    }
    public function view()
    {

    }
    public function src()
    {
        return "../src/";
    }
}
