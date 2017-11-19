<!--
	Author:			Cyrus
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>T3D WareHouse | Home</title>
  <?php require realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/style.php"; ?>
</head>
<body>

<!-- header -->
<?php require realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/header.php"; ?>

<div class="container-fluid text-center">
  <div class="row content">

    <!-- left sidenav -->
    <div class="col-sm-2 sidenav">
      <p><a href="#" class="btn btn-primary btn-block">New Announcement</a></p>
      <p><a href="#" class="btn btn-primary btn-block">New Project</a></p>
    </div>

    <!-- body -->
    <div class="col-sm-8 text-left"> 
      <h1>Home</h1>
      <!--
        body here
      -->
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

<?php include realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/footer.php"; ?>

</body>
</html>
