<!--
	Author:			Cyrus
	Created on:		2016 11 12
	Last modified:	2016 11 12
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>T3D WareHouse | Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/div.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<!-- header -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">WareHouse</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="projects.php">Projects</a></li>
        <li><a href="account.php">Account</a></li>
        <li><a href="settings.php">Settings</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

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
      <h1>Project Name</h1>

      <div class="tabbable" id="tabs-463690">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#panel-files" data-toggle="tab">Files</a>
          </li>
          <li>
            <a href="#panel-progress" data-toggle="tab">Progress</a>
          </li>
          <li>
            <a href="#panel-issues" data-toggle="tab">Issues</a>
          </li>
          <li>
            <a href="#panel-settings" data-toggle="tab">Settings</a>
          </li>
        </ul>
        <div class="tab-content">

          <div class="tab-pane active" id="panel-files">
            <p>
              Files
            </p>
          </div>

          <div class="tab-pane" id="panel-progress">
            <p>
              Progress
            </p>
          </div>

          <div class="tab-pane" id="panel-issues">
            <p>
              Issues
            </p>
          </div>

          <div class="tab-pane" id="panel-settings">
            <p>
              Settings
            </p>
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

<!-- footer -->
<footer class="container-fluid text-center">
  <p>ImagineWare Solutions 2017</p>
</footer>

</body>
</html>
