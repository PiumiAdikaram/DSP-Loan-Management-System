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
		.col-md-6{
			margin-bottom: 40px;
		}
	</style>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/header.css">
</head>
<body>



<!-----------------------header-start------------------------->

<div class="topnav" id="myTopnav">

  <img src="./images/logo.png" alt="Nature" class="responsive" style="width:130px;height: auto;padding-left: 2vh;">
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>

  <a href="#news">
    <?php 
        session_start();
        if(isset($_SESSION['username'])): ?>
        <a href="#" style="color: white;font-style: italic;background-color: #005959;text-decoration: none;"><?php echo $_SESSION['username']; ?></a>
        <?php else: ?>
        <?php endif; ?>

        <?php 
        if(isset($_SESSION['username'])): 
          ?>
        <a class="link" href="logout.php" style="text-decoration:none;background-color: #009999">logout</a>
        <?php else: ?>
          <a class="link" href="loginpage.php" style="text-decoration:none">login</a>
        <?php endif; ?>
        </a>



  <a href="#news">About Us</a>
  <a href="#contact">Contact</a>
<a href="LoanApplication.php">Apply Loan</a>
  <a href="home.php">Home</a>
  


</div>



<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

<!-----------------------header-end------------------------->

<h3>Edit Users</h3>


</body>
</html>


<?php
//session_start();
$loginuid=$_SESSION['uid'];
$userName=$_SESSION['uname'];
$userCategory=$_SESSION['ucat'];
//echo $userCategory;

//***********************start of customer*******************************************************************
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
	    <div class="col-md-6">
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
//***********************end of customer*******************************************************************


//***********************start of officer*******************************************************************
if($userCategory=="Officer"){
	//echo "Customer";
	require_once("connection.php");


	$sql = "SELECT* FROM officer WHERE userName='$userName'";
		$result=$conn->query($sql);
        $row=$result->fetch_assoc();
		$NIC=$row["nic"];
		$NameWI=$row["nameWithInitials"];
		$email=$row["email"];
		

	    if ($result->num_rows > 0) {

	    ?>
	    <div class="col-md-6">
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
//***********************end of officer*******************************************************************



//***********************start of manager*******************************************************************
if($userCategory=="Manager"){
	//echo "Customer";
	require_once("connection.php");


	$sql = "SELECT* FROM manager WHERE userName='$userName'";
		$result=$conn->query($sql);
        $row=$result->fetch_assoc();
		$NIC=$row["nic"];
		$NameWI=$row["nameWithInitials"];
		$email=$row["email"];
		

	    if ($result->num_rows > 0) {

	    ?>
	    <div class="col-md-6">
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
//***********************end of manager*******************************************************************


//***********************start of admin*******************************************************************
if($userCategory=="Admin"){
	//echo "Customer";
	require_once("connection.php");


	$sql = "SELECT* FROM admin WHERE userName='$userName'";
		$result=$conn->query($sql);
        $row=$result->fetch_assoc();
		$NIC=$row["nic"];
		$NameWI=$row["nameWithInitials"];
		$email=$row["email"];
		

	    if ($result->num_rows > 0) {

	    ?>
	    <div class="col-md-6">
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
//***********************end of admin*******************************************************************



//***********************start of cashcollector*******************************************************************
if($userCategory=="Cash Collector"){
	//echo "Customer";
	require_once("connection.php");


	$sql = "SELECT* FROM cashcollector WHERE userName='$userName'";
		$result=$conn->query($sql);
        $row=$result->fetch_assoc();
		$NIC=$row["nic"];
		$NameWI=$row["nameWithInitials"];
		$email=$row["email"];
		

	    if ($result->num_rows > 0) {

	    ?>
	    <div class="col-md-6">
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
//***********************--------------end of cashcollector*******************************************************************




//***************************************Remove users******************************************************

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

//***************************************end of remove users******************************************************

//***************************************issue new pw******************************************************

//----------------------------------------------------changing-------------------------------------------------------
if(isset($_POST['newpw'])){
	 $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
     $password=substr( str_shuffle( $chars ), 0, 8 );
     $pwencrypted=md5($password);
     $pwemail=$_POST['email'];
     //echo $password;
     //echo $loginuid;
     require_once("connection.php");
     $sql = "UPDATE login SET password='$pwencrypted' WHERE userId='$loginuid'";

	if ($conn->query($sql) === TRUE) {
	    //echo "Password Changed succesfully"."</br>";
	    ?>
	    <div class="col-md-6">
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

//----------------------------------------------------send email-------------------------------------------------------
	if(isset($_POST['sendpw'])){
		$to = $_POST['pwemail'];
        $subject = 'DSP Group Micro Credits';
        $message = "Your Password has been changed\n"."Your Username = ".$_POST['pwuname']."\nYour New Login Password = ".$_POST['newpwd'];
        $headers = 'From:nemodorylab2018@gmail.com';
      
       
          if (mail($to,$subject,$message,$headers)){
              echo "<h5 style='color:blue;'>Email Sent</h5>";
             echo "<script>alert('Email Sent Successfully.');</script>";
          }
          else{
            /*echo "<h5 style='color:red;'>";
              echo "Sending Failed! Check Your Internet Connection";
            echo "</h5>";*/
            echo "<script>alert('Sending Failed!');</script>";

          } 
	}
//***************************************issue new pw end******************************************************

?>
<head>
	 <link rel="stylesheet" type="text/css" href="./css/button.css">
</head>
<form style="float: right;margin-right:10px; ">
	<input type="submit" name="back" value="Back to >> Admin Dashboard" formaction="admin.php">
</form>
<?php require_once("footer.php"); ?>
<!--
 <div class="progress"><?php $pbar=10; ?>
  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $pbar;?>"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $pbar;?>%">
    <?php echo $pbar."%";?>
  </div>
</div>