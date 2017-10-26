<?php
class User
{
	public $id;
	public $name;
	public function __construct($id, $name) {
		if(empty($id) or empty($name))
		{
			throw new Exception("Wrong data");
		}
		else
		{
			$this->id = $id;
			$this->name = $name;
		}

      
    }
	public function getUname()
	{
		return $this->name;
	}
	public function getUid()
	{
		return $this->id;
	}	
}
class Product
{
	public $id;
	public $name;
	public $uid;
	public $uname;
	public function __construct(User $user, array $product) {
		if(empty($user) or empty($product))
		{
			throw new Exception("Wrong data");
		}
		else
		{
			$this->id = $product['id'];
			$this->name = $product['name'];
			$this->uid =$user->getUid();
			$this->uname =$user->getUname();
		}

      
    }
	public function getName()
	{
		return $this->name;
	}
	public function getId()
	{
		return $this->id;
	}
}
class ShoppingCart
{
   public $id;
   public $name;
   public $Products;
   public $singleProduct;
   public function __construct($id, $name)
   {
	    $this->Products=array();
	    $this->singleProduct=array();
		if(empty($id) or empty($name))
		{
			throw new Exception("Wrong data ");
		}
		else
		{
			$this->id = $id;
			$this->name = $name;
		}	
   }
   public function addToCart(Product $product)
   {
	   $this->singleProduct['Cart']=$this->name;
	   $this->singleProduct['Username']=$product->uname;
	   $this->singleProduct[$product->id]=$product->name;
	   
	   $this->Products[]=$this->singleProduct;
	   return $this->Products;
   }
   Public function removeFromCart($id)
   {
	   if (($key = array_search($id, $this->products)) !== false) {
		   unset($this->products[$key]);
		  }
   }
    
}
$userobject=new User(1,"Prithviraj");
$product1=array('id'=>'1','name'=>'HP Laptop 5210');
//print_r($product1);die;
$proobject=new Product($userobject,$product1);
$scartobj=new ShoppingCart('1',"Cart1");
$result=$scartobj->addToCart($proobject);
$product2=array('id'=>'2','name'=>'WD Harddisk');
$proobject=new Product($userobject,$product2);
$result=$scartobj->addToCart($proobject);
print_r($result);die;
// class Product
// {
	
	// id
	// name
	// user throw in constrocture
	// inherite father
	// composition by chair 
// }