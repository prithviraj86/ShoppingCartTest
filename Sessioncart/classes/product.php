<?php
class Product {

    private $conn;
    private $db;

    private $table='products';
    private $product_detail;
    private $product_price;

    private $id;
    private $admin_id;
    private $name;

    private $session_id;

    public function __construct()
    {
        $this->session_id=session_id();
        if(isset($_SESSION['user_id']))
        {
            $this->admin_id=$_SESSION['user_id'];
        }

        $this->db=new Database();
        $this->conn=$this->db->dbConn;
        if(!$this->conn)
        {
            throw new Exception('Database not connected in product');
        }

    }
    public function insertProduct(Product $probj,array $product)
    {
        $this->setName($product['name']);
        $this->setAdminId($this->admin_id);
        //$pid=$this->insertProductDetail();


        $sql="insert into ".$this->table."(
                                        name,
                                        admin_id) 
                                    values('".
            $this->getName()."',".
            $this->getAdminId().")";
        //echo $sql;die;
        $result=mysqli_query($this->conn,$sql);
        if(!$result)
        {
            throw new Exception('Product not inserted');
        }
        $this->setId($this->conn->insert_id);
        $this->product_detail=new ProductDetail($this->db,$probj);
        $this->product_detail->insertProductDetail($product);
        $this->product_price=new ProductPrice($this->db,$probj);
        $this->product_price->insertProductPrice($product);
        return $this->conn->insert_id;

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
				left join (select * from carts where session_ids='$this->session_id' ) c on c.product_id=p.id
				where p.id=".$id;
        //echo $sql;die;
        $result=mysqli_query($this->conn,$sql);
        $data=mysqli_fetch_array($result);
        return $data;
    }
    public function setId($id)
    {
        $this->id=$id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setName($name)
    {
        $this->name=$name;
    }
    public function getName()
    {
        return $this->name;
    }
    public  function setAdminId($aid)
    {
        $this->admin_id=$aid;
    }
    public function getAdminId()
    {
        return $this->admin_id;
    }
}
?>