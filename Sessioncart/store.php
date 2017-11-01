<?php
include("classes/product.php");
if(isset($_POST['addcart']))
{
	//echo $_REQUEST['pid'];die;
	$pid=$_POST['pid'];
	$obj=new Product();
	$result=$obj->addToCart($pid);
	if($result>0)
	{
		header('location:session.php');
		
	}
	else
	{
		header('location:singlep.php?id='.$pid.'&aerror=addtocartfail');
	}
	
}
?>