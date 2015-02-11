<?php
namespace notes\Database;
use notes\Config as Config;
class Database
{
    public $conn;
    
    public function getConnection()
    {
        try {
            $config = new Config();
            $connectHostString = "mysql:host=$config->DB_HOST;dbname=$config->DB_NAME";
            $this->conn = new \PDO($connectHostString, $config->DB_USER, $config->DB_PASS);
            return $this->conn;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function get($id, $sql)
    {
        $stmt = $this->getConnection()->prepare($sql);
        
        $stmt->execute(array(':id'=> $id));
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }
    public function put($input, $sql)
    {
        $conn   = $this->getConnection();
        $result = $conn->prepare($sql);
        $result->execute($input);
        $lastInsertid = $conn->lastInsertId();
        echo $lastInsertid;
        return $lastInsertid;
    }
    
    public function delete($id, $isDelete, $sql)
    {
        $conn   = $this->getConnection();
        $result = $conn->prepare($sql);
        $result->execute(array(':id' => $id, ':isDelete'=> $isDelete));
        return "Record deleted successfully";
        
    }
    
    public function update($updatelastName, $id, $sql)
    {
        $conn = $this->getConnection();
        $result = $conn->prepare($sql);
        $delete = $result->execute(array(':id'=> $id, ':lastName' => $updatelastName));
        return $delete;
    }
}