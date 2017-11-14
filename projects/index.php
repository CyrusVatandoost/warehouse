<!--
	Author:			Cyrus
	Created on:		2016 11 12
	Last modified:	2016 11 12
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>T3D WareHouse | Projects</title>
  <?php require realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/head_style.php"; ?>
</head>
<body>

<!-- header -->
<?php require realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/header.php"; ?>

<div class="container-fluid text-center">
  <div class="row content">

    <!-- left sidenav -->
    <div class="col-sm-2 sidenav">
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>

    <!-- body -->
    <div class="col-sm-8 text-left"> 
      <h1>Projects</h1>

      <!-- badge -->
      <ul class="nav nav-pills">
        <li class="active">
           <a href="#"> <span class="badge pull-right">3</span>My Projects</a>
        </li>
        <li>
           <a href="all.php"> <span class="badge pull-right">7</span>All Projects</a>
        </li>
      </ul>

      <hr>

      <div class="row">
        <div class="col-md-4">
          <div class="thumbnail">
            <img alt="Bootstrap Thumbnail First" src="http://lorempixel.com/output/people-q-c-600-200-1.jpg" />
            <div class="caption">
              <h3>
                <a href="/warehouse/project.php">Thumbnail label</a>
              </h3>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="thumbnail">
            <img alt="Bootstrap Thumbnail Second" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />
            <div class="caption">
              <h3>
                <a href="/warehouse/project.php">Thumbnail label</a>
              </h3>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="thumbnail">
            <img alt="Bootstrap Thumbnail Third" src="http://lorempixel.com/output/sports-q-c-600-200-1.jpg" />
            <div class="caption">
              <h3>
                <a href="/warehouse/project.php">Thumbnail label</a>
              </h3>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
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
