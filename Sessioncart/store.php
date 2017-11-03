<?php
include("autoload.php");
if(isset($_POST['addcart']))
{
	//echo $_REQUEST['pid'];die;
	$pid=$_POST['pid'];
	$obj=new Cart();
	$result=$obj->addToCart($pid);
	if($result>0)
	{
		header('location:index.php');
		
	}
	else
	{
		header('location:singlep.php?id='.$pid.'&aerror=addtocartfail');
	}
	
}
?>