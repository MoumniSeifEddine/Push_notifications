<?php
include "config.php";

include ('Push.php'); 
SESSION_START(); 
include('inc/header.php');
include "session.php";
$push = new Push();
include('inc/container.php');


$id=$_GET["id"];
$email="";
$username="";
$password="";
$section="";
$fullName="";

$res =  mysqli_query($link, "select * from notif_user where id=$id");
while($row=mysqli_fetch_array($res)){
    $email=$row["email"];
    $username=$row["username"];
    $password=$row["password"];
    $section=$row["section"];
    $fullName=$row["fullName"];
}

        $sql = "UPDATE notif_user set username='$username', password='$password', email='$email', section='$section', fullName='$fullName'";
        mysqli_query($link, $sql);
    mysqli_close($link);

?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
    <div class="wrapper">
    <a href="users.php"><buttton><---</button></a>

    <h2>Edit user</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <div class="form-group">
        <label for="fullName">full name:</label>
        <input type="text" class="form-control" id="fullName" placeholder="Enter full name" name="fullName"value="<?php echo $fullName; ?>">
        </div>
        <div class="form-group">
        <label for="username">username:</label>
        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username"value="<?php echo $username; ?>">
        </div>
        <div class="form-group">
        <label for="password">password:</label>
        <input type="text" class="form-control" id="password" placeholder="Enter password" name="password"value="<?php echo $password; ?>">
        </div>
        <div class="form-group">
            <label for="id">email:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $email; ?>">
            </div>
        <div class="form-group">
            <select name="section" id="section" maxlength="60">
                <option value="">section</option>
                <option value="DSI" id="DSI">DSI</option>
                <option value="MDW" id="MDW">MDW</option>
                <option value="SEM" id="SEM">SEM</option>
                <option value="ASR" id="ASR">ASR</option>
            </select>
        </div>
        
        <button type="submit" name="update" class="btn btn-default">update</button>
        </br></br></br>
        
    </form>
    </div>
    </div>
</body>
</html>




<?php
    
    if(isset($_POST["update"])){

        $res=mysqli_query($link, "update notif_user set username='$_POST[username]',password='$_POST[password]',section='$_POST[section]',email='$_POST[email]', fullName='$_POST[fullName]' where id=$id");
        if(res){
            echo('<script type="text/javascript">window.location="users.php";</script> ');
        }else {
            echo("you have a problem in this modification !!");
        }
        
    }


?> 
    
<?php include('inc/footer.php');?>