<?php
class ProductTest extends PHPUnit_Framework_TestCase
{

    Private $product;

    function setUp() {
        require_once 'User.php';
        require_once 'Product.php';
    }
    public function testSetGetUserData()
    {
        $user = new User(1, 'Prithviraj');

        $this->product=new Product($user,array('id'=>1,'name'=>'Hp Printer'));

        $this->assertEquals(1, $this->product->getPid());
        $this->assertEmpty($this->product->getPid());

        $this->assertEquals('Hp Printer', $this->product->getPname());
        //$this->assertEmpty($this->product->getPname());

        $this->assertEquals(1, $this->product->getUid());
        $this->assertEquals('Prithviraj', $this->product->getUname());

    }

    public function testThrowException()
    {
        $this->expectException(InvalidArgumentException::class);

        $this->product= new Product('', '');
    }



}
?>