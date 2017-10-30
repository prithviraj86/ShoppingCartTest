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
		$this->user = new User();
    }

	public function testSelectUserById()
	{
		//This  assertion Sucessfull
		$this->assertEquals(['name'=>'Prithviraj','email'=>'prithviraj86@gmail.com'], $this->user->selectUserById(1));
		//This assertion failed
		$this->assertEquals(['name'=>'Prithviraj','email'=>'prithviraj86@gmail.com1'], $this->user->selectUserById(1));
	}
	public function testSelectUsersCount()
	{
		
		// This assertion failed count number of row not matched
		$this->assertEquals(9, $this->user->selectUsers());
	}
    public function testInsertUser()
    {

        $this->assertEquals(9, $this->user->selectUsers(),'Count before insert');//Pass
        $this->asserttrue($this->user->insertUser('mohan','mohan@gmail.com'),'Insert query failed');//pass
        $this->assertEquals(10, $this->user->selectUsers(),'Inserting Failed');//pass
    }
	public function testUpdateUser()
    {

        
        $this->asserttrue($this->user->updateUser(4,'mohan','mohan@gmail.com'));//pass
        
    }
	public function testDeleteUser()
    {
		$this->asserttrue($this->user->deleteUser(4));//pass
    }
	




}