<?php
include('product.php');
class ShoppingCart extends product
{
   public $id;
   public $name;
   public function __construct()
   {
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
    
}