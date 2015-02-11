<?php
namespace notes\Mapper;

use notes\Model\User as UserModel;
use notes\Database\Database as Database;

class User
{
       public function create($id)
    {
        $user            = new UserModel();
        $user->id        = $id;
        $db              = new Database();
        $sqlquery        = "INSERT INTO user (firstName,lastName,emailid) VALUES (:firstName,:lastName,:emailid)";
        $user->firstName = $resultset['firstName'];
        $user->lastName  = $resultset['lastName'];
        $user->email     = $resultset['emailid'];
        $result          =$db->get($sql);
        return $user;
   }

    public function read($id)
    {
        $user            = new UserModel();
        $user->id        = $id;
        $db              = new Database();
        $sqlquery        = "select id,firstName,lastName,emailid from user where id=:id";
        $user->firstName = $resultset['firstName'];
        $user->lastName  = $resultset['lastName'];
        $user->email     = $resultset['emailid'];
        $result          =$db->get($sql);
        return $user;
    }
   public function update($id)
   {
        $user            = new UserModel();
        $user->id        = $id;
        $db              = new Database();
        $sqlquery        = "update user set firstName=$firstName where id=:id";
        $user->firstName = $resultset['firstName'];
        $user->lastName  = $resultset['lastName'];
        $user->email     = $resultset['emailid'];
        $result          =$db->post($sql);
        return $user; 
   }
   public function delete($id)
   {
        $user            = new UserModel();
        $user->id        = $id;
        $db              = new Database();
        $sqlquery        ="delete from user where id=:id";
        $user->firstName = $resultset['firstName'];
        $user->lastName  = $resultset['lastName'];
        $user->email     = $resultset['emailid'];
        $result          =$db->delete($sql);
        return $user; 
   }
}
