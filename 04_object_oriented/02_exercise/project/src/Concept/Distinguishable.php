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
       $first=$this->normalize();
        return $first."_".$this->id;
    }
    private function normalize()
    {
        $str=static::class;
        $str=strtolower($str);
        $str = str_replace('\\','_',$str);
        return $str;
    }
}