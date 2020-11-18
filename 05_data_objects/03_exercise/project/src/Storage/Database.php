<?php


namespace Storage;
use Concept\Distinguishable;
use PDO;


abstract class Database implements Storage
{
    protected PDO $pdo;


    public function __construct()
    {
        $this->pdo=new PDO("mysql:host=127.0.0.1;port=3306;dbname=test", "test", "test123");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS objects(`key` VARCHAR(30) PRIMARY KEY,`data` VARCHAR(120) )");
        $this->pdo->exec("DELETE FROM objects");
        //OBJECTS KEY DATA
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