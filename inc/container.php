
<body class="">
<div role="navigation" class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="" class="navbar-brand">notifSpace</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <?php if(isset($_SESSION['username']) && $_SESSION['role'] == 'admin') { ?>
              <li><a href="manage_notification.php">Manage Notification</a></li> 
              <li><a href="users.php">Manage users</a> </li>
              <li><a href="list_notif.php">notifacation list</a> </li>
              <li><a href="logout.php">Logout</a></li>
            <?php } ?>
            <?php if((isset($_SESSION['username']) && ($_SESSION['role'] == 'client') && isset($_SESSION['username']) && $_SESSION['username'])) { ?>
		          <li><a href="list_notif.php">notifications</a></li>
              <li><a href="logout.php">Logout</a><li>
            <?php }?>
            <?php if(!(isset($_SESSION['username']) && $_SESSION['username'])) { ?>
		          <li><a href="login.php">Login</a></li>
	          <?php }?>
          </ul>
         
        </div><!--/.nav-collapse -->
      </div>
    </div>
	
	<div class="container" style="min-height:500px;">
	<div class=''>
	</div>