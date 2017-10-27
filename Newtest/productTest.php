<?php
class ProductTest extends PHPUnit_Framework_TestCase
{

    Private $product;

    function setUp() {
        require_once 'User.php';
        require_once 'Product.php';
    }
    public function testSetGetUserProductData()
    {
        $user = new User(1, 'Prithviraj');

        $this->product=new Product($user,array('id'=>1,'name'=>'Hp Printer'));
        //Test for check Product id empty and equal
        $this->assertEquals(1, $this->product->getPid());
        $this->assertEmpty($this->product->getPid());
        //Test for check Product name equal
        $this->assertEquals('Hp Printer', $this->product->getPname());
        //$this->assertEmpty($this->product->getPname());
        //Test for check User id and username equal
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