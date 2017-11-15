<!-- header -->
<?php
session_start();

	if (isset($_SESSION['email'])) {
		$user = $_SESSION['email'];
		$redirect = "/warehouse/successlogin.php";}
	else{
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
      <a class="navbar-brand" href="/warehouse/home">WareHouse</a>
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
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search WareHouse"/>
            </div> 
            <button type="submit" class="btn btn-default">
              Search
            </button>
          </form>
        </li>
        <!-- login -->
        <li><a href="<?php echo $redirect;?>"><span class="glyphicon glyphicon-log-in"></span> <?php echo $user;?></a></li>
      </ul>
    </div>
  </div>
</nav>