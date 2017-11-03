<?php
include("autoload.php");
$proobj=new Product();
$data=$proobj->listProduct();
//if(isset($_SESSION['user_id']))
//{
//$proobj=new Product();
//$uid=$_SESSION['user_id'];
//$data=$proobj->listProduct();
//$productdata=array(
//                'name'=>'Lee Coopper Boots',
//                'admin_id'=>1,
//                'manufacturer'=>'Lee Coopper',
//                'quantity'=>10,
//                'weight'=>'300g',
//                'description'=>'Leather bootd',
//                'price'=>4000,
//                'sprice'=>3000
//);
//$proobj->setName($productdata['name']);
//$proobj->setAdminId($productdata['admin_id']);
//$proobj->setManufacturer($productdata['manufacturer']);
//$proobj->setQuantity($productdata['quantity']);
//$proobj->setWeight($productdata['weight']);
//$proobj->setDescription($productdata['description']);
//$proobj->setPrice($productdata['price']);
//$proobj->setSpecialPrice($productdata['sprice']);
//
//$proobj->insertProduct($proobj);
//}

//die;
?>
<html>
    <head>
        <title></title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/album.css">
    </head>
    <body>
    <?php
    include('header.php');

    ?>
        <main role="main">

            <section class="jumbotron text-center">
                <div class="container">
                    <h1 class="jumbotron-heading">Store Products</h1>

                </div>
            </section>

            <div class="album text-muted">
                <div class="container">

                    <div class="row">
                        <?php
                        foreach($data as $value)
                        {

                            ?>
                            <div class="card">
                                <img src="images/<?php echo $value['image_link']; ?>" alt="Product image cap" class="img-thumbnail rounded mx-auto d-block" >
                                <h4></h4><?php echo  $value['name']; ?></h4>
                                <br>
                                <p class="card-text">Price:-<?php echo  $value['price']; ?></p>
                                <a href="singlep.php?id=<?php echo $value['id']; ?>"  ><button style="cursor: pointer;"  class="btn btn-primary">Buy</button></a>
                            </div>

                            <?php
                        }
                        ?>


                    </div>

                </div>
            </div>

        </main>


    </body>
</html>


