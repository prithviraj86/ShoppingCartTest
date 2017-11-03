<?php
include("autoload.php");
$obj=new Cart();

$data=$obj->getCart();

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
            <?php
            $total=0;
            foreach($data as $value)
            {
                //print_r($value);die;
                $total+=$value['price'];

                ?>
                <div class="row">
                    <div class="col-md-2">
                        <img src="https://thumbs.dreamstime.com/z/whirligig-icon-whirlabout-vector-design-peg-top-symbol-web-graphic-jpg-ai-app-logo-object-flat-image-sign-eps-art-picture-stock-79859295.jpg" class="img-thumbnail" style="width: 200px; height: 200px;">
                    </div>
                    <div class="col-md-7">
                        <h3><?php echo $value['name']; ?></h3>


                    </div>
                    <div class="col-md-1">
                        <p><?php echo $value['price']; ?></p>
                    </div>

                </div>

                <?php
            }
            ?>
            <div class="row">
                <div class="col-md-9 text-right"><strong>Total:-</strong></div>
                <div class="col-md-3 text-left"><strong><?php echo $value['sum_price']; ?></strong></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-10 text-right">
                    <a href="checkout.php"  >
                    <button style="cursor: pointer;" class="btn btn-primary">CheckOut</button>
                    </a>
                </div>
            </div>


        </div>
    </div>

</main>


</body>
</html>


