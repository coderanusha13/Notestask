<?php
namespace notes\Model;
class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testCanCreateAnObject()
    {
        $u=new User();
        $this->assertInstanceOf('notes\Model\User',$u);
    }
}