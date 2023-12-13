<?php
    include "config.php";
    include "session.php";
    $id = $_GET["id"];
    mysqli_query($link,"delete from notif_user where id=$id");

    ?>
    <script type="text/javascript">
    window.location="users.php";
    </script>