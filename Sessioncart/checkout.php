<?php
include('classes/product.php');
if(!isset($_SESSION['user_id']))
{
    header("location:login.php");
}

$obj=new Product();
if(isset($_POST['ordernow']))
{
    $data=[
        'paymode'=>$_POST['pmode'],
        'street'=>$_POST['street'],
        'city'=>$_POST['city'],
        'state'=>$_POST['state'],
        'pin'=>$_POST['pin']
    ];


    $resultset=$obj->setOrder($data);
    if($resultset)
    {
        header("location:Success.php");
    }
}

?>
<html>
<head>
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/album.css">
</head>
<body>
<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">CheckOut & Place Order</h1>

        </div>
    </section>

    <div class="album text-muted">
        <div class="container">

            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="street">Street Address</label>
                            <input type="text" name="street" class="form-control" id="street" placeholder="Street Address">
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" id="city" placeholder="City">
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" name="state" class="form-control" id="state" placeholder="state">
                        </div>
                        <div class="form-group">
                            <label for="state">Pin Code</label>
                            <input type="text" name="pin" class="form-control" id="pin" placeholder="Pin Code">
                        </div>
                        <div class="form-group">
                            <label for="state"><strong>Payment Mode</strong></label>
                            <br>
                            <input type="Checkbox" name="pmode" value="cash"  id="cash"> Cash ON Delivery &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="Checkbox" name="pmode" value="card"  id="card"> Card
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary" name="ordernow">Place Order</button>
                        </div>



                    </form>
                </div>
            </div>
            <div class="col-md-3">
            </div>

        </div>
    </div>

</main>


</body>
</html>



