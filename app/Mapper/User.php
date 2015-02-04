<?php
namespace notes\Mapper;

use notes\Model\User as UserModel;
use notes\Database\Database as Database;

class User
{
    public function read($id)
    {
        $user            = new UserModel();
        $user->id        = $id;
        $db              = new Database();
        $sqlquery        = "select id,firstName,lastName,emailid from user where id=:id";
        $user->firstName = $resultset['firstName'];
        $user->lastName  = $resultset['lastName'];
        $user->email     = $resultset['emailid'];
        $db->read($sql);
        return $user;
    }
   
}
