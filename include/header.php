<!-- header -->
<?php
session_start();

	if (isset($_SESSION['email'])) {
		$user = $_SESSION['email'];
		$redirect = "/warehouse/successlogin.php";}
	else {
		$user = "Login";
		$redirect = "/warehouse/login/main_login.php";}

?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/warehouse/welcome/">WareHouse</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      	<?php
          if($_SERVER['REQUEST_URI'] == "/warehouse/home/")
            echo "<li class=active><a href=/warehouse/home>Home</a></li>";
          else
            echo "<li><a href=/warehouse/home>Home</a></li>";

      		if($_SERVER['REQUEST_URI'] == "/warehouse/projects/")
      			echo "<li class=active><a href=/warehouse/projects>Projects</a></li>";
      		else
      			echo "<li><a href=/warehouse/projects>Projects</a></li>";

      		if($_SERVER['REQUEST_URI'] == "/warehouse/account.php")
      			echo "<li class=active><a href=/warehouse/account.php>Account</a></li>";
      		else
      			echo "<li><a href=/warehouse/account.php>Account</a></li>";


          if($_SERVER['REQUEST_URI'] == "/warehouse/organization/")
            echo "<li class=active><a href=/warehouse/organization/>Organization</a></li>";
          else
            echo "<li><a href=/warehouse/organization/>Organization</a></li>";

          if($_SERVER['REQUEST_URI'] == "/warehouse/contact.php")
            echo "<li class=active><a href=/warehouse/contact.php>Contact Us</a></li>";
          else
            echo "<li><a href=/warehouse/contact.php>Contact Us</a></li>";
        ?>
      </ul>
      <!-- navbar-right -->
      <ul class="nav navbar-nav navbar-right">
        <!-- search -->
        <li>
          <form class="navbar-form navbar-left" role="search">
            <input type="text" class="form-control" placeholder="Search WareHouse"/>
            <a class="btn btn-default">
              <i class="material-icons md-18">search</i>
            </a>
          </form>
        <li>
          <a href="#" data-toggle="dropdown" class="btn">
            <i class="material-icons md-18 md-light">menu</i>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">Account</a>
            <li><a href="#">Edit Account</a>
            <li><a href="#">Settings</a>
            <li class="divider">
            <li><a href="/warehouse/login/main_login.php">Logout</a>
          </ul>
      </ul>
    </div>
  </div>
</nav>