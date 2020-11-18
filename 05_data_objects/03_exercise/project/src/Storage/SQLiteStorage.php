<?php

namespace Storage;

use Concept\Distinguishable;
use PDO;
use Config\Directory;



class SQLiteStorage extends Database
{
    public function __construct()
    {   $this->pdo=new PDO("sqlite:../storage/db.sqlite");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS objects(`key` VARCHAR(30) PRIMARY KEY,`data` VARCHAR(120) )");
        $this->pdo->exec("DELETE FROM objects");
    }
}