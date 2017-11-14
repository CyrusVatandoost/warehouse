<!-- header -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/warehouse/">WareHouse</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      	<?php
      		if($_SERVER['REQUEST_URI'] == "/warehouse/projects/")
      			echo "<li class=active><a href=/warehouse/projects>Projects</a></li>";
      		else
      			echo "<li><a href=/warehouse/projects>Projects</a></li>";

      		if($_SERVER['REQUEST_URI'] == "/warehouse/account.php")
      			echo "<li class=active><a href=/warehouse/account.php>Account</a></li>";
      		else
      			echo "<li><a href=/warehouse/account.php>Account</a></li>";
        ?>
      </ul>
      <!-- navbar-right -->
      <ul class="nav navbar-nav navbar-right">
        <!-- search -->
        <li>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search Projects/Members"/>
            </div> 
            <button type="submit" class="btn btn-default">
              Search
            </button>
          </form>
        </li>
        <!-- login -->
        <li><a href="/warehouse/login/main_login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>