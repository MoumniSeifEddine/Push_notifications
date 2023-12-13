<?php
include "connction.php";
SESSION_START(); 
include('inc/header.php');
include "session.php";
if(!isset($_SESSION["username"])){
    header("location:login.php");
}
?>

<?php include('inc/container.php');?>
<style>
.borderless tr td {
    border: none !important;
    padding: 2px !important;
}
</style>
<body>

<ul>

 
</ul>

    <p>
        <!-- <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a> -->
        
    </p>
    <div>
    <h2> Push Notification System </h2>
        <H3>user</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <!-- <th>id</th> -->
        <th>title</th>
        <th>msg</th>
        <th>time</th>

      </tr>
    </thead>
    <tbody>
        <?php
            $username=$_SESSION['username'];
            if(isset($_SESSION['username']) && $_SESSION['username'] == 'admin') { 
              $res= mysqli_query($link, "select * from notif");
            }
            if((isset($_SESSION['username']) && ($_SESSION['username'] != 'admin') && isset($_SESSION['username']) && $_SESSION['username'])) {
              $res= mysqli_query($link, "select * from notif where user='$username' || section=(select section from notif_user where username ='$username')");
            }
            if (!$res) {
              printf("Error: %s\n", mysqli_error($link));
              exit();
          }
            while($row=mysqli_fetch_array($res)){
              echo "<tr>";
              echo "<td>"; echo $row["title"]; echo "</td>";
              echo "<td>"; echo $row["notif_msg"]; echo "</td>";
              echo "<td>"; echo $row["notif_time"]; echo "</td>";
              /*echo "<td>"; ?> <a href="delete2.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-success">delete</button> </a><?php echo "</td>";*/
            }
        ?>
    </tbody> 
  </table>
</div>



</form>
</body>
</html>
