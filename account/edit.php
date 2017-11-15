<!--
	Author:			Cyrus
	Created on:		2016 11 11
	Last modified:	2016 11 11
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>T3D WareHouse | Edit Account</title>
  <?php require realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/head_style.php"; ?>
</head>
<body>

<!-- header -->
<?php require realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/header.php"; ?>

<div class="container-fluid text-center">
  <div class="row content">

    <!-- left sidenav -->
    <div class="col-sm-2 sidenav">
      <p><a href="#">Edit Profile</a></p>
    </div>

    <!-- body -->
    <div class="col-sm-8 text-left"> 
      <p>
        <p>First Name:</p>
        <input type = "text" name=" " size="40"/>
        <p>Middle Name:</p>
        <input type = "text" name=" " size="40"/>
        <p>Last Name:</p>
        <input type = "text" name=" " size="40"/>
        <p>E-mail:</p>
        <input type = "text" name=" " size="40"/>
        <p>Biography</p>
        <textarea cols="50" rows="20"></textarea>
        <br><br>
        <button> Cancel </button>
        <button> Done </button>
      </p>
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
