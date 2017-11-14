<!--
	Author:			Christian
	Created on:		2016 11 12
	Last modified:	2017 11 15
-->
<?php require "login/loginheader.php"; 
$user = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div class="container">
      <div class="form-signin">
        <div class="alert alert-success">Welcome, <?php echo $user?>! <strong>You have successfully logged in</strong>.</div>
        <a href="login/logout.php" class="btn btn-default btn-lg btn-block">Logout</a>
      </div>
    </div> <!-- /container -->
  </body>
</html>
