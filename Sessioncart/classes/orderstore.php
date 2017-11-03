<?php
class Orderstore
{

    private $db;
    private $conn;
    private $user_id;
    private $address_table='addresses';
    private $order_table='orders';
    private $order_items_table='order_items';
    private $order_shipping_table='order_shipping';
    private $order_payment_table='order_payment';

    private $cartdata;
    private $paytotal;
    private $address_id;
    private $payment_id;
    private $order_id;

    public function __construct()
    {
        $this->user_id=$_SESSION['user_id'];
        $this->db=new Database();
        $this->conn=$this->db->dbConn;
        if(!$this->conn)
        {
            throw new Exception('Database not connected in Order');
        }
    }
    public function insertOrder(Order $order)
    {
        $this->insertAddress($order);
        $cart=new Cart();
        $this->cartdata=$cart->getCart();
        $this->insertPayment($order,$this->cartdata->fetch_object()->sum_price);
        $sql_order="insert into ".$this->order_table."(user_id,payment_id,status) values(".$this->user_id.",".$this->payment_id.",1)";
        $ord_result=mysqli_query($this->conn,$sql_order);
        $this->order_id=$this->conn->insert_id;
        $this->insertShipping();
        $result=$this->insertItems();
        if($result)
        {
            $cart->emptyCart();
        }


    }
    public function insertAddress(Order $order)
    {
        ////Insert in to address table for get address id
        $sql="insert into ".$this->address_table."(
                            user_id,
                            first_name,
                            middel_name,
                            last_name,
                            street,
                            city,
                            state,
                            pin_no
                            ) 
                            values(".$this->user_id.",'".
                                $order->getFirstName()."','".
                                $order->getMiddelName()."','".
                                $order->getLastName()."','".
                                $order->getStreet()."','".
                                $order->getCity()."','".
                                $order->getState()."',".
                                $order->getPin().")";
        //echo $sql;die;
        $add_result=mysqli_query($this->conn,$sql);
        if(!$add_result)
        {
            throw new Exception('Address not saved');
        }
        $this->address_id=$this->conn->insert_id;
       // return $this->address_id;
    }
    public function insertPayment(Order $order,$totalamaount)
    {
        $sql="insert into ".$this->order_payment_table."(
                            paid_amount,
                            payment_method,
                            status
                            ) 
                        values(".
                            $totalamaount.",'".
                            $order->getPaymentMode()."',1)";
        //echo $sql;die;
        $pay_result=mysqli_query($this->conn,$sql);
        if(!$pay_result)
        {
            throw new Exception('Payment Failed');
        }
        $this->payment_id=$this->conn->insert_id;
        //return $this->payment_id;
    }
    public function insertShipping()
    {
        $sql_order="insert into ".$this->order_shipping_table."(order_id,address_id) values(".$this->order_id.",".$this->address_id.")";
        mysqli_query($this->conn,$sql_order);
    }
    public function insertItems()
    {
        $item_data=array();
        foreach($this->cartdata as $value )
        {
            $item_data[]="(".$this->order_id.",".$value['id'].",".$value['price'].")";
        }
        $final_items=implode(",",$item_data);

        $sql_order_items="insert into ".$this->order_items_table."(order_id,product_id,price) values $final_items";

        $ord_shp_result=mysqli_query($this->conn,$sql_order_items);

        return $ord_shp_result;
    }


}