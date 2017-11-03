<?php
class Cart
{
    private $db;
    private $conn;
    private $session_id;
    private $table='carts';

    public function __construct()
    {
        $this->session_id=session_id();
        $this->db=new Database();
        $this->conn=$this->db->dbConn;
        if(!$this->conn)
        {
            throw new Exception('Database not connected in cart');
        }
    }
    public function addToCart( int $id)
    {

        $sql="insert into ".$this->table."(product_id, session_ids) values($id, '$this->session_id')";
        //echo $sql;die;
        $result=mysqli_query($this->conn, $sql);

        $new_id=$this->conn->insert_id;
        return $new_id;
    }
    public function getCart()
    {
        $this->session_id=session_id();
        $sql="select smp.sum_price,p.id,p.name,pp.price from ".$this->table." c
            inner join 
              (
                select sum(ppr.price) as sum_price,cc.session_ids from ".$this->table." cc 
                    inner join product_price ppr on ppr.product_id=cc.product_id 
                    where  cc.session_ids='$this->session_id') smp on c.session_ids=smp.session_ids   
			inner join products p on p.id=c.product_id
			inner join product_details pd on pd.product_id=p.id
			inner join product_price pp on pp.product_id=p.id
			
			where c.session_ids='$this->session_id'
			
			";
        //echo $sql;die;
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }
    public function emptyCart()
    {
        $sessionid=session_id();
        $sql="delete from ".$this->table." where session_ids='$this->session_id'";
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }
}


