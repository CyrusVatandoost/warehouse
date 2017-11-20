<!--
	Author:			Cyrus
	Created on:		2016 11 01
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>T3D WareHouse | Contact Us</title>
  <?php require realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/style.php"; ?>

</head>
<body>

<!-- header -->
<?php require realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/header.php"; ?>

<div class="container-fluid text-center">
  <div class="row content">

    <!-- left sidenav -->
    <div class="col-sm-2 sidenav">
      <p><a href="/warehouse/projects">Featured Projects</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>

    <!-- body -->
    <div class="col-sm-8 text-left"> 
      <p>
        <!--
          body here
        -->

        <h2>Contact Us</h2><br><br><br><br>

        <form>
          Name: &nbsp;&nbsp;&nbsp; <input type="text" name="name" ><br><br><br>

          E-mail: &nbsp;&nbsp; <input type="text" name="email" ><br><br><br>

          Topic: &nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="topic"><br><br><br>

          Comment: <textarea name="comment" rows="6" cols="25"></textarea><br><br>

          <input type="submit" value="Send"><span style="display:inline-block; width: 20px;"></span><input type="reset" value="Clear">
        </form>

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

<?php include realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/footer.php"; ?>

</body>
</html>
