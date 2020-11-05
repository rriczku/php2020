<?php
namespace Storage;
use Concept\Distinguishable;
use Config\Directory;

class FileStorage implements Storage
{

    public function store(Distinguishable $dis)
    {
        $path=\Config\Directory::storage();
        $path=$path.$dis->key();
        $data=serialize($dis);
        file_put_contents($path,$data);
    }

    public function loadAll()
    {
        $myarray=array();
       $data=scandir(\Config\Directory::storage());
       // print_r($data);
        foreach($data as $t => $t_value){
            if($t_value!="."&&$t_value!=".."&&$t_value!=".gitignore")
            {
                $t_value=Directory::storage().$t_value;
                $temp=file_get_contents($t_value);

                array_push($myarray,unserialize($temp)) ;
            }
        }
        return $myarray;

       //$dsr=unserialize($data);
        //return $dsr;
    }
}