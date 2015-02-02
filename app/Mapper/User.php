<?php
namespace notes\Mapper;

use notes\Model\User as UserModel;

class User
{
    public function create($input)
    {
        $user            = new UserModel();
        $dbhost          = "localhost";
        $dbname          = "notes";
        $dbuser          = "root";
        $dbpass          = "Dbtest123";
        $conn            = new \PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $user->firstName = $input['firstName'];
        $user->lastName  = $input['lastName'];
        $user->emailid   = $input['emailid'];
        $sql             = "INSERT INTO user (firstName,lastName,emailid) VALUES (:firstName,:lastName,:emailid)";
        $q               = $conn->prepare($sql);
        $q->execute(array(
            ':firstName' => $user->firstName,
            ':lastName' => $user->lastName,
            ':emailid' => $user->emailid
        ));
        $user->id = $conn->lastInsertId();
        return $user;
    }
    /*This function reads the data from the database */
    public function read($id)
    {
        $user     = new UserModel();
        $user->id = $id;
        $dbhost   = "localhost";
        $dbname   = "notes";
        $dbuser   = "root";
        $dbpass   = "Dbtest123";
        $conn     = new \PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $sql      = "select id,firstName,lastName,emailid from user where id=:id";
        $q        = $conn->prepare($sql);
        $q->execute(array(
            ':id' => $user->id
        ));
        $resultset = $q->fetch(\PDO::FETCH_ASSOC);
        if ($q->rowCount() == 0) {
            throw new \Exception("User not found.");
        } else {
            $user->firstName = $resultset['firstName'];
            $user->lastName  = $resultset['lastName'];
            $user->email     = $resultset['emailid'];
            return $user;
        }
        
    }
    
}
