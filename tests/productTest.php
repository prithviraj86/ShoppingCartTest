<?php

class ProductTest extends PHPUnit_Framework_TestCase
{
	Private $id;
	Private $name;
	Private $uid;
	Private $uname;
	Private $user;
	protected function setUp()
	{
		require_once 'userTest.php';
		$this->user = new UserTest();
	}
	protected  function tearDown()
	{
		$this->user = NULL;
	}
	public function testAdddetail()
	{
		$this->setPid(1);
		$this->setPname('Hp Laptop');
		$this->user->setUid(1);
		$this->user->setUname('Prithviraj');
		$this->uid =$this->user->getUid();
		$this->assertEquals(1, $this->uid);
		$this->uname =$this->user->getUname();
		$this->assertEquals('Prithviraj', $this->uname);
	}
	public function setPname($name)
	{
		if(!is_string($name))
		{
			throw new Exception("Product name must be a string!");
		}
		else
		{
			$this->name=$name;
		}
	}
	public function getPname()
	{
		return $this->name;
	}
	public function setPid($id)
	{
		if(!is_integer($id))
		{
			throw new Exception("Product id must be a number!");
		}
		else
		{
			$this->id=$id;
		}
	}
	public function getPid()
	{
		return $this->id;
	}
	// public function getUid()
	// {
		// return $this->uid;
	// }
	// public function getUname()
	// {
		// return $this->uname;
	// }
	
}
?>