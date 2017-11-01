<?php
include("classes/login.php");

$obj=new login();
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $resultset=$obj->login($email,$password);
    if($resultset)
    {
        header("location:cart.php");
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
            <h1 class="jumbotron-heading">Login</h1>

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
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary" name="submit">SignIn</button>
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


