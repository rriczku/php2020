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
        return Directory::$root . "storage/";
    }
    public function view()
    {
        return Directory::$root . "view/";
    }
    public function src()
    {
        return Directory::$root .  "src/";
    }
}
