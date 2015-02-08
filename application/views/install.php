<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 05/02/15
 * Time: 5:56 PM
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/signin.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <form class="form-signin" action = "/" method="POST">
        <h2 class="form-signin-heading">Installer</h2>
        <label for="inputDBName" class="sr-only">Database Name</label>
        <input type="text" id="inputDBName" name = "inputDBName" class="form-control" placeholder="comp4711" required>
        <label for="dbUsername" class="sr-only">Database Username</label>
        <input type="text" id="dbUsername" name = "dbUsername" class="form-control" placeholder="root" required>
        <label for="dbPassword" class="sr-only">Database Password</label>
        <input type="password" id="dbPasswordPassword" name="dbPassword" class="form-control" placeholder="" >

        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
    </form>

</div> <!-- /container -->

</body>
</html>
