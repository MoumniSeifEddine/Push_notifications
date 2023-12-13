<?php
    include "config.php";
    include "session.php";
    $id = $_GET["id"];
    mysqli_query($link,"delete from notif where id=$id");
    echo("notification deleted with secces !");
    ?>
        <script type="text/javascript">
        window.location="index.php";
        </script>