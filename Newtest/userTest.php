<?php
class UserTest extends PHPUnit_Framework_TestCase
{
    Private $id;
    Private $name;
//	Private $uid;
//	Private $uname;
    Private $user;

    function setUp() {
        require_once 'User.php';
    }

    public function testGetUserData()
    {

        $this->user = new User(1, 'Prithviraj');
        $this->assertEquals(1, $this->user->getUid());
        $this->assertEquals('Prithviraj', $this->user->getUname());
    }


    public function testThrowException()
    {
        $this->expectException(InvalidArgumentException::class);

        $this->user = new User('', '');
    }


}
?>