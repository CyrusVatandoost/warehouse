<!--
	Author:			Cyrus
	Created on:		2016 11 01
	Last modified:	2017 11 15
-->

<!DOCTYPE html>
<html lang="en">
<head>
	<title>T3D WareHouse | Home</title>
  <?php require realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/head_style.php"; ?>
</head>
<body>

<!-- header -->
<?php require realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/header.php"; ?>

<center>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <p>
      <div class="carousel slide" id="carousel-191868">
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
            <img alt="Carousel Bootstrap First" src="http://lorempixel.com/output/sports-q-c-1600-500-1.jpg" width="100%" />
            <div class="carousel-caption">
              <h4>
                First Thumbnail label
              </h4>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
            </div>
          </div>
          <div class="item">
            <img alt="Carousel Bootstrap Second" src="http://lorempixel.com/output/sports-q-c-1600-500-2.jpg" width="100%"/>
            <div class="carousel-caption">
              <h4>
                Second Thumbnail label
              </h4>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
            </div>
          </div>
          <div class="item">
            <img alt="Carousel Bootstrap Third" src="http://lorempixel.com/output/sports-q-c-1600-500-3.jpg" width="100%"/>
            <div class="carousel-caption">
              <h4>
                Third Thumbnail label
              </h4>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
            </div>
          </div>
        </div> <a class="left carousel-control" href="#carousel-191868" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-191868" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
      </div>
    </div>
  </div>
</div>

<?php include realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/footer.php"; ?>

</body>
</html>
