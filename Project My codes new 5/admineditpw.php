<?php
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
     $password=substr( str_shuffle( $chars ), 0, 8 );
if(isset($_POST['newpw'])){
	$loginuid=$_POST['uid'];
	 
     //echo $password;
     //echo $loginuid;
     require_once("connection.php");
     $sql = "UPDATE login SET password='$password' WHERE userId='$loginuid'";

	if ($conn->query($sql) === TRUE) {
	    echo "Password Changed succesfully"."</br>";
	    echo "New Password : ".$password;
	    echo "<form><input type='submit' value='Send New Password' formaction='.' class='btn btn-primary' ></form>";
	} else {
	    echo "Error password Changing: " . $conn->error;
	}

}

?>