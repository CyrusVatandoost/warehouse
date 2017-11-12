<!--
	Author:			Cyrus
	Created on:		2016 11 12
	Last modified:	2016 11 12
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>T3D WareHouse | Project</title>
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

<?php include realpath($_SERVER['DOCUMENT_ROOT'])."/warehouse/include/footer.php"; ?>

</body>
</html>
