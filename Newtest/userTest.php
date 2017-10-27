<?php
class UserTest extends PHPUnit_Framework_TestCase
{
    Private $id;
    Private $name;
//	Private $uid;
//	Private $uname;
    Private $user;


    public function testGetUserData()
    {
        require_once 'User.php';
        $this->user = new User(1, 'Prithviraj');
        $this->assertEquals(1, $this->user->getUid());
        $this->assertEquals('Prithviraj', $this->user->getUname());
    }

    public function testThrowException()
    {
        $this->expectException(InvalidArgumentException::class);
        require_once 'User.php';
        $this->user = new User('', '');
    }


}
?>