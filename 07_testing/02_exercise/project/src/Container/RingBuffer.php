<?php

namespace Container;

class RingBuffer
{
    public $array=[];
     private $size=0;
     private $pos=0;
     private $head=0;
     private $tail=0;

    public function __construct($elem)
    {
       $this->array=array_fill(0,$elem,null);
    }


    public function at($i)
    {
        return $this->array[$i];
    }

    public function size()
    {
        if($this->empty()) return 0;
        else return $this->size;
    }

    public function empty()
    {
       for($i=0;$i<count($this->array);$i++)
       {
           if($this->array[$i]!=null)
               return false;
       }
       return true;
    }

    public function capacity()
    {
        return count($this->array);
    }

    public function push($i)
    {
        $this->array[$this->pos]=$i;
        $this->head=$this->array[$this->pos];
        $this->pos=($this->pos+1)%$this->capacity();
        $this->size=min($this->size+1,$this->capacity());
    }

    public function pop()
    {
        $result=$this->tail();
        $this->array[$this->tail]=null;
        $this->size--;

        return $result;
    }

    public function tail()
    {
        $p=$this->pos-$this->size;
        $p+=$this->capacity();

        if($this->capacity()!=0)
            $this->tail=$p%$this->capacity();
        return $this->array[$this->tail];
    }

    public function head()
    {
        return $this->head;
    }

    public function full()
    {
        return $this->size==$this->capacity();
    }

}
