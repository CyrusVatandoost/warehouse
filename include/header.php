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

      	<?php
      		if($_SERVER['REQUEST_URI'] == "/warehouse/index.php")
      			echo "<li class=active><a href=/warehouse/index.php>Home</a></li>";
      		else
      			echo "<li><a href=/warehouse/index.php>Home</a></li>";

      		if($_SERVER['REQUEST_URI'] == "/warehouse/projects.php")
      			echo "<li class=active><a href=/warehouse/projects>Projects</a></li>";
      		else
      			echo "<li><a href=/warehouse/projects>Projects</a></li>";

      		if($_SERVER['REQUEST_URI'] == "/warehouse/account.php")
      			echo "<li class=active><a href=/warehouse/account.php>Account</a></li>";
      		else
      			echo "<li><a href=/warehouse/account.php>Account</a></li>";
        ?>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/warehouse/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>