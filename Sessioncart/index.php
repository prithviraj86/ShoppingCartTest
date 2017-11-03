<?php
include("autoload.php");


$proobj=new Product();
$data=$proobj->listProduct();
//$productData=array(
//                'name'=>'Hp Keyborad',
//                'admin_id'=>1,
//                'manufacturer'=>'Lekhraj',
//                'quantity'=>1,
//                'weight'=>'200g',
//                'description'=>'Wireless Keyboard Mouse',
//                'price'=>15000,
//                'sprice'=>13500
//);
//$proobj->insertProduct($proobj,$productData);

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
                                <img data-src="holder.js/100px280?theme=thumb" alt="Product image cap">
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


