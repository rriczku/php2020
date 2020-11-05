<?php

namespace Widget;
use Concept\Distinguishable;
class Link extends Widget
{

    public function draw()
    {
        $temp=$this->key();
        echo "<a href=\"\">$temp</a><br/>";
    }

}