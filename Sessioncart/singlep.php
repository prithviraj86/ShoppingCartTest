<?php
include("autoload.php");
if(!isset($_GET['id']))
{
	echo "Wrong url request";
}
else
{
	$id=$_GET['id'];
	$obj=new Product();
	$data=$obj->getProductById($id);	
	
	//print_r($data);
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
            <h1 class="jumbotron-heading">Products Detail</h1>

        </div>
    </section>

    <div class="album text-muted">
        <div class="container">

            <div class="row">
                <?php

                    ?>
                    <div class="card">
                        <?php //echo $data['id'] ?>
                        <h2><?php echo $data['name']; ?></h2>

                        <p>
                        <h4>Description</h4>
                        <p><?php echo $data['description']; ?></p>
                        <ul>
                            <li><?php echo $data['manufacturer']; ?></li>
                            <li><?php echo $data['weight']; ?></li>
                        </ul>
                        <label>Price:-</label><?php echo $data['price'];?>

                        </p>
                        <?php
                        if($data['cart_id']=='')
                        {

                            ?>
                            <form action="store.php" method="post">
                                <input type="hidden" value="<?php echo $data['id'] ?>" name="pid"/>
                                <input type="submit" value="Add to cart" class="btn btn-primary" name="addcart"/>
                            </form>

                            <?php
                        }
                        else
                        {
                            ?>
                            <a href="cart.php"  >
                            <input type="submit" value="Go to cart" style="cursor: pointer;" class="btn btn-primary" name="gocart"/>
                            </a>


                            <?php
                        }
                        }
                        ?>
                    </div>
                </div>





            </div>

        </div>
    </div>

</main>


</body>
</html>
