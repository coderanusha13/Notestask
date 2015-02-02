<?php
namespace notes\Mapper;

require_once '../../vendor/autoload.php';
use notes\Mapper\User as UserMapper;

class UserTest extends \PHPUnit_Extensions_Database_TestCase
{
    
    public function getConnection()
    {
        $dbhost = "localhost";
        $dbname = "notes";
        $dbuser = "root";
        $dbpass = "Dbtest123";
        $pdo    = new \PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        return $this->createDefaultDBConnection($pdo, $dbname);
    }
    public function testIsCountIncreased()
    {
        $this->assertEquals(2, $this->getConnection()->getRowCount('user'), "Pre-Condition");
        $input      = array(
            'firstName' => 'Anusha',
            'lastName' => 'Hiremath',
            'emailid' => 'anusha@gmail.com'
        );
        $userMapper = new UserMapper();
        $userMapper->create($input);
        $this->assertEquals(2, $this->getConnection()->getRowCount('user'), "Inserting failed");
    }
    public function testCanReadUserByUserId()
    {
        $userMapper = new UserMapper();
        $user       = $userMapper->read('1');
        $this->assertEquals('Anusha', $user->firstName);
    }
    public function getDataSet()
    {
        return $this->createXMLDataSet(dirname(__FILE__) . '/files/user-seed.xml');
    }
}
