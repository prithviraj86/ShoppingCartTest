<?php
include("connection.php");
class Product extends Database
{
	//public $id;
	public $conn;
	
	public function __construct()
	{
		//$this->conn=new Database();
		//print_r($this->conn);
		$this->conn=parent::__construct();
	}
	public function listProduct()
	{
		$sql="select p.id,p.name,pp.price from products p 
			inner join product_details pd on pd.product_id=p.id
			inner join product_price pp on pp.product_id=p.id
			left join product_images pi on pi.product_id=p.id
			";
		$result=mysqli_query($this->conn,$sql);
		return $result;
	}
	
	public function getProductById(int $id)
	{
		$sql="select p.id as id, p.name,pd.quantity,pd.manufacturer	,pd.weight,pd.description,pp.price,pp.special_price as sprice,c.id as cart_id from products p
				inner join product_details pd on pd.product_id=p.id
				inner join product_price pp on pp.product_id=p.id
				left join product_images pi on pi.product_id=p.id
				left join carts c on c.product_id=p.id
				where p.id=".$id;
		$result=mysqli_query($this->conn,$sql);
		$data=mysqli_fetch_array($result);
		return $data;
	}
	public function addToCart( int $id)
	{
		$sessionid=session_id();
		$sql="insert into carts(product_id, session_ids) values($id, '$sessionid')";
		//echo $sql;die;
		$result=mysqli_query($this->conn, $sql);
		
		$new_id=$this->conn->insert_id;
		return $new_id;
	}
	public function getCart()
    {
        $sessionid=session_id();
        $sql="select smp.sum_price,p.id,p.name,pp.price from carts c
            inner join 
              (
                select sum(ppr.price) as sum_price,cc.session_ids from carts cc 
                    inner join product_price ppr on ppr.product_id=cc.product_id 
                    where  cc.session_ids='$sessionid') smp on c.session_ids=smp.session_ids   
			inner join products p on p.id=c.product_id
			inner join product_details pd on pd.product_id=p.id
			inner join product_price pp on pp.product_id=p.id
			
			where c.session_ids='$sessionid'
			
			";
        //echo $sql;die;
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }
    public function emptyCart()
    {
        $sessionid=session_id();
        $sql="delete from carts where session_ids='$sessionid'";
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }
    public function setOrder($data)
    {
        //print_r($data);die;

        $sessionid=session_id();
        $uid=$_SESSION['user_id'];
        ////Insert in to address table for get address id
        $sql="insert into addresses(user_id,street,city,state,pin_no) values($uid,'".$data['street']."','".$data['city']."','".$data['state']."',".$data['pin'].")";
        //echo $sql;die;
        $add_result=mysqli_query($this->conn,$sql);
        $aid=$this->conn->insert_id;

        ////Insert in to Payment_table for get Payment id
        $cartData=$this->getCart();
        $paidAmount=$cartData->fetch_object()->sum_price;
        $sql_pay="insert into order_payment(paid_amount,payment_method,status) values(".$paidAmount.",'".$data['paymode']."',1)";
        $pay_result=mysqli_query($this->conn,$sql_pay);
        $pay_id=$this->conn->insert_id;

        ////Insert into order table for get order id
        $sql_order="insert into orders(user_id,payment_id,status) values(".$uid.",".$pay_id.",1)";
        $ord_result=mysqli_query($this->conn,$sql_order);
        $order_id=$this->conn->insert_id;

        ////Insert into order table for get order id
        $sql_order="insert into order_shipping(order_id,address_id) values(".$order_id.",".$aid.")";
        $ord_shp_result=mysqli_query($this->conn,$sql_order);
        //Insert In to Order items
        $item_data=array();
        foreach($cartData as $value )
        {
            $item_data[]="(".$order_id.",".$value['id'].",".$value['price'].")";
        }
        $final_items=implode(",",$item_data);

        $sql_order_items="insert into order_items(order_id,product_id,price) values $final_items";

        $ord_shp_result=mysqli_query($this->conn,$sql_order_items);

        return $this->emptyCart();






    }

}

