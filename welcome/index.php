<!--
	Author:			Cyrus
	Created on:		2016 11 01
	Last modified:	2017 11 15
-->

<!DOCTYPE html>
<html lang="en">
<head>
	<title>T3D WareHouse | Welcome</title>
  <?php require realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/style.php"; ?>
</head>
<script type="text/javascript">
  $('.carousel').carousel({
    interval: 2000
  })
</script>
<body>

<!-- header -->
<?php require realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/header.php"; ?>

<div class="carousel slide" id="carousel-191868" data-ride="carousel">
  <ol class="carousel-indicators">
    <li class="active" data-slide-to="0" data-target="#carousel-191868">
    </li>
    <li data-slide-to="1" data-target="#carousel-191868">
    </li>
    <li data-slide-to="2" data-target="#carousel-191868">
    </li>
  </ol>
  <div class="carousel-inner">
    <div class="item active">
      <img alt="Carousel Bootstrap First" src="/warehouse/res/homepage1.jpg" width="100%"/>
    </div>
    <div class="item">
      <img alt="Carousel Bootstrap Second" src="/warehouse/res/homepage2.jpg" width="100%"/>
    </div>
    <div class="item">
      <img alt="Carousel Bootstrap Third" src="/warehouse/res/homepage3.jpg" width="100%"/>
    </div>
  </div>
  <a class="left carousel-control" href="#carousel-191868" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-191868" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12" style="padding: 5%;">
      <p>
      <h3>
        Welcome to WareHouse!
      </h3>
      <p>
        The goal of WareHouse is to serve as a repository for journals and researches for the TE3D House. It is designed to manage and organize the organization's projects and files. Although this repository is made for the TE3D House, it can be remodelled and reprogrammed for use by other companies, organizations, and institutions with the goal of file management and organization. This software offers a distributed version control and source code management functionality of Git.
      <p>
        What are you waiting for? Get started now!
      </p>
      <center>
        <a href="/warehouse/projects" class="btn btn-primary btn-lg">
          Browse Projects
        </a>
      </center>
    </p>
    </div>
  </div>
</div>

<?php include realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/footer.php"; ?>

</body>
</html>
