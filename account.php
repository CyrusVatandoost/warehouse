<!--
	Author:			Cyrus
	Created on:		2016 11 11
	Last modified:	2016 11 11
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>T3D WareHouse | Account</title>
  <?php require realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/style.php"; ?>
</head>
<body>

<!-- header -->
<?php require realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/header.php"; ?>

<div class="container-fluid text-center">
  <div class="row content">

    <!-- left sidenav -->
    <div class="col-sm-2 sidenav">
      <p><a href="#" class="btn btn-primary btn-block">Edit Profile</a></p>
    </div>

    <!-- body -->
    <div class="col-sm-8 text-left"> 
      <br>
      <img src="res/account.png" width="150" height="150">
      <h1>Juan Dela Cruz</h1>
      <p><a href="#">juandelacruz@dlsu.edu.ph</a>
      <p>T3D Member
    
      <hr>
      <p>Hi I am Juan and I am a third year college student taking up bachelor of science computer science in De La Salle University</p>

      <hr>
      <h3>Personal Projects</h3>

      <div class="row">
        <div class="col-md-4">
          <div class="thumbnail">
            <img alt="Bootstrap Thumbnail First" src="http://lorempixel.com/output/people-q-c-600-200-1.jpg" />
            <div class="caption">
              <h3>
                <a href="/warehouse/project.php">User Experience</a>
              </h3>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
              <p>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="thumbnail">
            <img alt="Bootstrap Thumbnail Second" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />
            <div class="caption">
              <h3>
                <a href="/warehouse/project.php">Neural Networks</a>
              </h3>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
              <p>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="thumbnail">
            <img alt="Bootstrap Thumbnail Third" src="http://lorempixel.com/output/sports-q-c-600-200-1.jpg" />
            <div class="caption">
              <h3>
                <a href="/warehouse/project.php">Database Management</a>
              </h3>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
              <p>
              </p>
            </div>
          </div>
        </div>
      </div>

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
