<!--
	Author:			Cyrus
	Created on:		2016 11 11
	Last modified:	2016 11 11
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>T3D WareHouse | Account</title>
  <?php require realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/head_style.php"; ?>
</head>
<body>

<!-- header -->
<?php require realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/header.php"; ?>

<div class="container-fluid text-center">
  <div class="row content">

    <!-- left sidenav -->
    <div class="col-sm-2 sidenav">
      <p><a href="#">Edit your profile</a></p>
    </div>

    <!-- body -->
    <div class="col-sm-8 text-left"> 
      <h1>Account</h1>
      <img src="res/account.png" width="150" height="150">
      <p>Name: Juan Dela Cruz</p>
      <p>Type of User: Member</p>
    
      <hr>
      <h3>About Myself</h3>
      <p>Hi I am Juan and I am a third year college student taking up bachelor of science computer science in De La Salle University</p>
    </div>
   
    <!-- right sidenav -->
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>

  </div>
</div>  

<?php include realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/footer.php"; ?>

</body>
</html>
