<?php 
include ('connction.php');
include ('Push.php'); 

SESSION_START(); 
include('inc/header.php');
include "session.php";
$push = new Push();
?>
<?php include('inc/container.php');?>
<style>
.borderless tr td {
    border: none !important;
    padding: 2px !important;
}
</style>
<div class="container">
    <h3>users List:</h3>
	<table class="table">
		<thead>
			<tr>
				<th>id</th>
				<th>username</th>
				<th>password</th>
				<th>email</th>
				<th>section</th>
                <th></th>
			</tr>
		</thead>
		<tbody>
			<?php 
            
			$userList = $push->listUsers(); 
			foreach ($userList as $key) {
			?>
			<tr>
				<td><?php echo $key['id'] ?></td>
				<td><?php echo $key['username'] ?></td>
				<td><?php echo $key['password'] ?></td>
				<td><?php echo $key['email'] ?></td>
				<td><?php echo $key['section']; ?></td>
                <td><a href="delete.php?id=<?php echo $key["id"]; ?>"><input type="submit" name="delete" value="delete"/></a></td>
                <?php
                    if (isset($_POST['delete'])){

                    }
                ?>
			</tr>
			<?php } ?>
            
		</tbody>
	</table>
</div>
<?php include('inc/footer.php');?>