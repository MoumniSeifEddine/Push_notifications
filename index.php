<?php 
SESSION_START();
include('inc/header.php');
include "session.php";

include('inc/container.php');

/*<title>push_notification</title>
<script src="notification.js"></script>
<?php include('inc/container.php');?>
<div class="container">		
	<h2> Push Notification System </h2>	
	<?php if(isset($_SESSION['username']) && $_SESSION['username'] == 'admin') { ?>
		<h3>Admin Account </h3>
		<center>
<h1 class="my-5">Hi, <b><?php echo ($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
</center>
		<h4>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h4>
	<?php } 
	 if((isset($_SESSION['username']) && ($_SESSION['username'] != 'admin') && isset($_SESSION['username']) && $_SESSION['username'])) { ?>
		<h3>User Account </h3>
		<center>
<h1 class="my-5">Hi, <b><?php echo ($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
</center>
		<h4>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h4>
	<?php } if(!(isset($_SESSION['username']))) { ?>
		<h4>Welcome <strong></strong></h4>	
	<?php } ?>	
</div>	*/
 include('inc/footer.php');?>






