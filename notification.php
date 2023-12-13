<?php 
SESSION_START(); 
include ('Push.php');  
$push = new Push(); 
$array=array(); 
$rows=array();
if(!(($_SESSION['username']=="")or $_SESSION['username']=="admin")){
    $notifList = $push->listNotificationUser($_SESSION['username']);
}

$record = 0;
foreach ($notifList as $key) {
 $data['title'] = $key['title'];
 $data['msg'] = $key['notif_msg'];
 $data['icon'] = 'C:\Users\asus5\OneDrive\Images';
 $data['url'] = 'https://localhost/ab/list_notif.php';
 $rows[] = $data;
}
$array['notif'] = $rows;
$array['count'] = $record;
$array['result'] = true;
echo json_encode($array);
?>