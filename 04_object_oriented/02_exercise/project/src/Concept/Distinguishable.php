<?php
namespace Concept;

abstract class Distinguishable
{
    public $id;
    function __construct($num)
    {
        $this->id=$num;
    }
    public function key()
    {
       $first=self::normalize();
        return $first."_".$this->id;
    }
    public static function normalize()
    {
        $str=static::class;
        $str=strtolower($str);
        $str = str_replace('\\','_',$str);
        return $str;
    }
}