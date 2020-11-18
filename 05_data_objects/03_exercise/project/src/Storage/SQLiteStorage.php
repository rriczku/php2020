<?php

namespace Storage;

use Concept\Distinguishable;
use PDO;
use Config\Directory;



class SQLiteStorage implements Storage
{
    private $pdo;

    public function __construct()
    {
        $this->pdo=new PDO("sqlite:../storage/db.sqlite");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS objects(`key` VARCHAR(30) PRIMARY KEY,`data` VARCHAR(120) )");
        $this->pdo->exec("DELETE FROM objects");
    }

    public function store(Distinguishable $distinguishable) : void
    {
        $statement = $this->pdo->prepare("INSERT INTO objects VALUES (:key, :data)");
        $statement->bindValue('key',$distinguishable->key());
        $statement->bindValue('data',serialize($distinguishable));
        $statement->execute();
    }

    public function loadAll(): array
    {
        $query = $this->pdo->query("SELECT * FROM objects");
        $results=$query->fetchAll(PDO::FETCH_ASSOC);

        $result=[];
        foreach ($results as $a => $a_value) {
            array_push($result,unserialize($a_value['data']));
        }


        return $result;
    }

}