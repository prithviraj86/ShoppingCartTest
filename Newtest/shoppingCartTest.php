<?php
class ShoppingCartTest extends PHPUnit_Framework_TestCase
{

    Private $user;
    Private $product;
    Private $cart;

    function setUp() {
        require_once 'User.php';
        require_once 'Product.php';
        require_once 'shoppingcart.php';
    }
    public function testSetGetCartFields()
    {


        $this->cart=new ShoppingCart(1,'Cart1');
        //
        //Test for check Cart id and name  false and equal
        $cid=$this->cart->getCid();
        //echo $cid;die;
        $this->assertEquals(1, $cid);
        $this->assertFalse(empty($cid));

        $this->assertEquals('Cart1', $this->cart->getCname());
        $this->assertFalse(empty($this->cart->getCname()));


    }
    public function testAddToCart()
    {
        $this->user = new User(1, 'Prithviraj');

        $this->product=new Product($this->user,array('id'=>1,'name'=>'Hp Printer'));

        $this->cart=new ShoppingCart(1,'Cart1');
        $result=$this->cart->addToCart($this->product);

        $this->assertEmpty($result);///Test fail here  if comment this line test passsed
        $this->assertContains(array( 'Cart' => 'Cart1','Username'=>'Prithviraj','Product_id'=>'1','Product_name'=>'Hp Printer'),$result);
    }
    public function testAddToCartReturnJson()
    {
        $this->user = new User(1, 'Prithviraj');

        $this->product=new Product($this->user,array('id'=>1,'name'=>'Hp Printer'));

        $this->cart=new ShoppingCart(1,'Cart1');
        $json=$this->cart->addToCart($this->product);

        $this->assertJson($json);
    }

//
//    public function testThrowException()
//    {
//        $this->expectException(InvalidArgumentException::class);
//
//        $this->product= new Product('', '');
//    }



}
?>