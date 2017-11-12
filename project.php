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
            <table class="table">
              <thead>
                <tr>
                  <th>#<th>Product<th>Payment Taken<th>Status
              </thead>
              <tbody>
                <tr>
                  <td>1
                  <td>TB - Monthly
                  <td>01/04/2012
                  <td>Default
                <tr class="active">
                  <td>1
                  <td>TB - Monthly
                  <td>01/04/2012
                  <td>Approved
                <tr class="success">
                  <td>2
                  <td>TB - Monthly
                  <td>02/04/2012
                  <td>Declined
                <tr class="warning">
                  <td>3
                  <td>TB - Monthly
                  <td>03/04/2012
                  <td>Pending
                <tr class="danger">
                  <td>4
                  <td>TB - Monthly
                  <td>04/04/2012
                  <td>Call in to confirm
              </tbody>
            </table>
          </div>

          <div class="tab-pane" id="panel-progress">
            <br>
            <div class="progress progress-striped">
              <div class="progress-bar progress-success">
              </div>
            </div>
            <h2>
              Heading
            </h2>
            <p>
              Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
              <a class="btn" href="#">View details »</a>
            </p>
          </div>

          <div class="tab-pane" id="panel-issues">
            <p>
              <div class="jumbotron">
                <h2>
                  Hello, world!
                </h2>
                <p>
                  This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
                </p>
                <p>
                  <a class="btn btn-primary btn-large" href="#">Learn more</a>
                </p>
              </div>
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
