<?php
class Push {
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "push_notification";    
    private $notifTable = 'notif';
	private $userTable = 'notif_user';
	private $dbConnect = false;
	public function __construct(){
		$conn =  mysqli_connect("localhost","root","") or die(mysqli_error($conn));
		mysqli_select_db($conn,"push_notification") or die(mysqli_error($conn));
		$this->dbConnect = $conn;
	}
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            	
		}
		return $data;
	}
	public function listNotification($admin_deleted){
		$sqlQuery = "SELECT * FROM ".$this->notifTable;
        return  $this->getData($sqlQuery);
	}	
	public function listNotificationUser($user){
		$sqlQuery = "SELECT * FROM ".$this->notifTable." WHERE user='$user' || section=(select section from ".$this->userTable." where username ='$user')";
		return  $this->getData($sqlQuery);
	}
	public function listUsers(){
		$sqlQuery = "SELECT * FROM ".$this->userTable." WHERE username != 'admin'";
        return  $this->getData($sqlQuery);
	}		
	public function listUsers2($section){
		$sqlQuery = "SELECT * FROM ".$this->userTable." WHERE section = ".$section;
        return  $this->getData($sqlQuery);
	}	
	public function loginUsers($username, $password){
		$sqlQuery = "SELECT id as userid, username, password, section, role FROM ".$this->userTable." WHERE username='$username'  AND password='$password'";
        return  $this->getData($sqlQuery);
	}	
	public function saveNotification($title, $msg, $time, $loop, $loop_every, $user,$section){
		$sqlQuery = "INSERT INTO ".$this->notifTable."(title, notif_msg, notif_time, notif_repeat, notif_loop, user,section) VALUES('$title', '$msg', '$time', '$loop', '$loop_every', '$user','$section')";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			return ('Error in query: '. mysqli_error());
		} else {
			return $result;
		}
	}	
	public function saveUser($id, $fullName, $username, $password, $email, $section){
		$sqlQuery = "INSERT INTO ".$this->userTable."(username, password, email, section, fullName) VALUES( '$username', '$password', '$email', '$section', '$fullName')";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			return ('Error in query: '. mysqli_error());
		} else {
			return $result;
		}
	}	
	public function deleteUser($id, $fullName, $username, $password, $email, $section){
		$sqlQuery = "DELETE * FROM ".$this->userTable."where id=".$this->userTable."(id)";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			return ('Error in query: '. mysqli_error());
		} else {
			return $result;
		}
	}	
	public function updateNotification($id, $nextTime) {		
		$sqlUpdate = "UPDATE ".$this->notifTable." SET notif_time = '$nextTime', publish_date=CURRENT_TIMESTAMP(), notif_loop = notif_loop-1 WHERE id='$id')";
		mysqli_query($this->dbConnect, $sqlUpdate);
	}	
}
?>