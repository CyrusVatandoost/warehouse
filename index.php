<!--
	Author:			Cyrus
	Created on:		2016 11 01
	Last modified:	2016 11 11
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
      <h1>Welcome to WareHouse!</h1>

    <!-- carousel -->
    <div class="row">
      <div class="col-md-12">
        <div class="carousel slide" id="carousel-534241">
          <ol class="carousel-indicators">
            <li class="active" data-slide-to="0" data-target="#carousel-534241">
            </li>
            <li data-slide-to="1" data-target="#carousel-534241">
            </li>
            <li data-slide-to="2" data-target="#carousel-534241">
            </li>
          </ol>
          <div class="carousel-inner">
            <div class="item active">
              <img alt="Carousel Bootstrap First" src="http://lorempixel.com/output/sports-q-c-1600-500-1.jpg" />
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
              <img alt="Carousel Bootstrap Second" src="http://lorempixel.com/output/sports-q-c-1600-500-2.jpg" />
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
              <img alt="Carousel Bootstrap Third" src="http://lorempixel.com/output/sports-q-c-1600-500-3.jpg" />
              <div class="carousel-caption">
                <h4>
                  Third Thumbnail label
                </h4>
                <p>
                  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                </p>
              </div>
            </div>
          </div> <a class="left carousel-control" href="#carousel-534241" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-534241" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
      </div>
    </div>

    <hr>

    <p>
      Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. <em>Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui.</em> Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. <small>Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu.</small>
    </p>
    <blockquote>
      <p>
        There can only be ONE!
      </p> <small>Dan Lachica <cite>Why My Life Sucks</cite></small>
    </blockquote>
    <p>
      Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. <em>Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui.</em> Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. <small>Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu.</small>
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
