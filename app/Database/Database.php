<?php
namespace notes\Database;
use notes\Config as Config;

class Database
{
    private $connection;
    public function __construct()
    {
        $config = new Config();
       $this->$connection     = new \PDO("mysql:host=$config->DB_HOST,dbname=$config->$DB_NAME", $config->DB_USER, $config->DB_PASS);
    }
    
    public function get($sqlquery)
    {
        $statement = $connection->prepare($sqlquery);
        $statement->execute(array(
            ':id' => $user->$id
        ));   
        $result = $statement->fetch(\PDO::FETCH_ASSOC);
        print_r $result;
        
    }
}
