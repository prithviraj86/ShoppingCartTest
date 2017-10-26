<?php
include('product.php');
class ShoppingCart
{
   Private $id;
   Private $name;
   public $Products;
   public $singleProduct;
   public function __construct($cid,$cname)
   {
	    $this->Products=array();
	    $this->singleProduct=array();
		if(empty($cid) or empty($cname))
		{
			throw new Exception("Wrong data ");
		}
		else
		{
			
			$this->setCid($cid);
			$this->setCname($cname);
			
		}	
   }
   public function addToCart(Product $product)
   {
	   $this->singleProduct=array();
	   $this->singleProduct['Cart']=$this->getCname();
	   $this->singleProduct['Username']=$product->getUname();
	   
	   $this->singleProduct[$product->getPid()]=$product->getPname();
	   
	   $this->Products[]=$this->singleProduct;
	   return $this->Products;
   }
   Public function removeFromCart($id)
   {
	   if (($key = array_search($id, $this->products)) !== false) {
		   unset($this->products[$key]);
		  }
   }
   public function setCname($name)
	{
		if(!is_string($name))
		{
			throw new Exception("Cart name must be a string!");
		}
		else
		{
			$this->name=$name;
		}
	}
	public function getCname()
	{
		return $this->name;
	}
	public function setCid($id)
	{
		if(!is_integer($id))
		{
			throw new Exception("Cart id must be a number!");
		}
		else
		{
			$this->id=$id;
		}
	}
	public function getCid()
	{
		return $this->id;
	}
    
}
