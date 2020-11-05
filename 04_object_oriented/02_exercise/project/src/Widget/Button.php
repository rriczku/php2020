<?php
namespace Widget;

use Concept\Distinguishable;
class Button extends Widget
{
    public function draw()
    {
        $temp=$this->key();
        echo "<input type=\"button\" value=\"$temp\"><br/>";
    }

}