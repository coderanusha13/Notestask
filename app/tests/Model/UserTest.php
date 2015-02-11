<?php
namespace notes\Model;
class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testCanCreateObject()
    {
        $u = new User();
        $this->assertInstanceOf('notes\Model\User', $u);
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
}



