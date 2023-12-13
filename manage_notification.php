<?php 
include ('Push.php'); 
SESSION_START(); 
include('inc/header.php');
include "session.php";
$push = new Push();
?>
<title> Push Notification System </title>
<?php include('inc/container.php');?>
<style>
.borderless tr td {
    border: none !important;
    padding: 2px !important;
}
</style>
<div class="container">		
	<h2> Push Notification System </h2>
	<hr>
	<div class="row">
		<div class="col-sm-6">
			<h3>Add New Notification:</h3>
			<form method="post"  action="<?php echo $_SERVER['PHP_SELF']; ?>">										
				<table class="table borderless">
					<tr>
						<td>Title</td>
						<td><input type="text" name="title" class="form-control" required></td>
					</tr>	
					<tr>
						<td>Message</td>
						<td><textarea name="msg" cols="50" rows="4" class="form-control" required></textarea></td>
					</tr>			
					<tr>
						<td>section</td>
						<td><select name="section" id="section" maxlength="60">
								<option value="">Saisissez le section</option>
								<option value="DSI" id="DSI">DSI</option>
								<option value="MDW" id="MDW">MDW</option>
								<option value="SEM" id="SEM">SEM</option>
								<option value="ASR" id="ASR">ASR</option>
                			</select>
						</td>
					</tr>
					<tr>
						<td>For</td>
						<td><select name="user" class="form-control">
						<option value="">student</option>
						<?php 	
							
							$user = $push->listUsers(); 
							foreach ($user as $key) {
						?>
							<option value="<?php echo $key['username'] ?>"><?php echo $key['username'] ?></option>
						<?php } ?>
						</select></td>
					</tr>
					<tr>
						<td colspan=1></td>
						<td colspan=1></td>
					</tr>					
					<tr>
						<td colspan=1></td>
						<td><button name="submit" type="submit" class="btn btn-info">Add Message</button></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<?php 
	if (isset($_POST['submit'])) { 
		if(isset($_POST['msg']) and isset($_POST['user'])) {
			$title = $_POST['title'];
			$msg = $_POST['msg']; 
			$time = date('Y-m-d H:i:s');
			$section= $_POST['section']; 
			$user=$_POST['user']; 
			$loop=1;
			$loop_every=10;
			$ch='\ ';
			if ($msg[0]=="'" or $msg[0]=='"'){
				echo 'vous n\'avez pas commencer votre message avec (\' ou ")';
			}else{
				for ($i = 1; $i<= strlen($msg);$i++){
					if ($msg[$i]=="'" or $msg[$i]=='"'){
						$msg2=substr($msg,0,$i);
						$msg2=$msg2.$ch[0];
						$msg2=$msg2.substr($msg,$i,strlen($msg));
					}
				}
				$msg=$msg2;
				$isSaved = $push->saveNotification($title, $msg, $time, $loop, $loop_every, $user,$section);
				if($isSaved) {
					echo '* save new notification  success';
				} else {
					echo 'error save data';
				}
			} 
			
		} else {
			echo '* completed the parameter above';
		}
	} 
	?>
</div>	
<?php include('inc/footer.php');?>