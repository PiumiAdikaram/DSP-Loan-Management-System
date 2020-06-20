<!DOCTYPE html>
<html>
<head>
	<title>editusers</title>
	<style type="text/css">
		form{
			transform: 50%;
			
		}
		h3{
			text-align: center;
		}
	</style>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<h3>Edit Users</h3>
</body>
</html>


<?php
session_start();
$loginuid=$_SESSION['uid'];
$userName=$_SESSION['uname'];
$userCategory=$_SESSION['ucat'];
//echo $userCategory;
if($userCategory=="Customer"){
	//echo "Customer";
	require_once("connection.php");


	$sql = "SELECT* FROM customer WHERE nic='$userName'";
		$result=$conn->query($sql);
        $row=$result->fetch_assoc();
		$NIC=$row["nic"];
		$NameWI=$row["nameWithInitials"];
		$email=$row["email"];
		

	    if ($result->num_rows > 0) {

	    ?>
	    <div class="col-sm-4">
	    	<h4>User Deatils</h4>
			<form action="." method="POST">
				User ID<br>
				<input type="text" name="uid" value="<?php echo $loginuid; ?>" class="form-control" readonly><br>
				NIC Number<br>
				<input type="text" name="nic" value="<?php echo $NIC; ?>" class="form-control"><br>
				User Category:<br>
				<input type="text" name="ucat" value="<?php echo $userCategory; ?>" class="form-control"><br>
				Name with Initials:<br>
				<input type="text" value="<?php echo $NameWI; ?>" class="form-control"><br>
				Email Address:<br>
				<input type="text" name="email" value="<?php echo $email; ?>" class="form-control"><br>
				<input type="submit" name="newpw" value="Issue New Password" onclick="return confirm('Do you need to change password?');" formaction="editusers.php" class="btn btn-primary">
				<input type="submit" name="editudet" value="Edit Deatils" onclick="return confirm('Do you need to save changes?');" formaction="editusers.php" class="btn btn-primary">
				<input type="submit" name="delete" value="Remove" onclick="return confirm('Remove User\n\nDo you need to remove this user?');" formaction="editusers.php" class="btn btn-primary">
				

			</form>
		</div>

	    <?php
	    } else {
	        echo "Error Occured! " . $conn->error;
	    }





}

if($userCategory=="Officer"){
	echo "Officer";
}


if(isset($_POST['delete'])){
	$userName=$_POST['nic'];
	//echo $userName;
	//echo $loginuid;
	$sql = "DELETE FROM login WHERE userId=$loginuid";

	if ($conn->query($sql) === TRUE) {
         // echo "User Removed Succesfully";
         echo "<script>window.alert('User Removed Succesfully');
	window.location.assign('admin.php');</script>";      
          
    } else {
       echo "Error occured";         //echo "Error deleting record: " . $conn->error;
     }
}

if(isset($_POST['newpw'])){
	 $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
     $password=substr( str_shuffle( $chars ), 0, 8 );
     $pwemail=$_POST['email'];
     //echo $password;
     //echo $loginuid;
     require_once("connection.php");
     $sql = "UPDATE login SET password='$password' WHERE userId='$loginuid'";

	if ($conn->query($sql) === TRUE) {
	    //echo "Password Changed succesfully"."</br>";
	    ?>
	    <div class="col-sm-4">
	    	<h4>Password Changed succesfully</h4>
	    	<form action="editusers.php" method="POST">
	    		Username:<br>
	    		<input type="text" name="pwuname" value="<?php echo $userName; ?>" class="form-control" readonly><br>
	    		New Password:<br>
	    		<input type="text" name="newpwd" value="<?php echo $password; ?>" class="form-control" readonly><br>
	    		User Email:<br>
	    		<input type="text" name="pwemail" value="<?php echo $email; ?>" class="form-control"><br>
	    		<input type="submit" name="sendpw" value="Send New Password" class='btn btn-primary' ><br>
	    	</form>
	    </div>
	    <?php

	} else {
	    echo "Error password Changing: " . $conn->error;
	}

}


	if(isset($_POST['sendpw'])){
		$to = $_POST['pwemail'];
        $subject = 'DSP Group Micro Credits';
        $message = "Your Password has been changed\n"."Your Username = ".$_POST['pwuname']."\nYour New Login Password = ".$_POST['newpwd'];
        $headers = 'From:nemodorylab2018@gmail.com';
      
       
          if (mail($to,$subject,$message,$headers)){
              echo "<h5 style='color:blue;'>Email Sent</h5>";
             
          }
          else{
            echo "<h5 style='color:red;'>";
              echo "Sending Failed! Check Your Internet Connection";
            echo "</h5>";

          } 
	}


?>
<!--
 <div class="progress"><?php $pbar=10; ?>
  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $pbar;?>"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $pbar;?>%">
    <?php echo $pbar."%";?>
  </div>
</div>