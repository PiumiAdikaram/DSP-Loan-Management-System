<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dspdb";
	
	// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Function for Delete Button
	
	// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["delete"])){
	$uid=$_POST["uid"];
	// sql to delete a record
	$sql = "DELETE FROM admin WHERE adminId='$uid'";
	
	if (mysqli_query($con, $sql)) {
    echo "Record deleted successfully";
	} 
	else {
    echo "Error deleting record: " . mysqli_error($con);
	}
}

// Function for Add Button
if (isset($_POST["add"])){

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "dspdb";
	
	// Create connection
		$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
		$con = mysqli_connect("localhost","root","","dspdb");
		if (!$con) {
    	die("Connection failed: " . mysqli_connect_error());
		}
		
		else{
		
		$nameWithInitials  = $_POST["nwi"];
		$nic     = $_POST["nic"];
		$email      = $_POST["email"];
		$address = $_POST["address"];
		$phoneNumber  = $_POST["phone"];

	$query = "INSERT INTO admin (nameWithInitials,nic,email,address,phoneNumber) VALUES ('$nameWithInitials','$nic','$email','$address','$phoneNumber')";

	if (mysqli_query($con, $query)) {
	    
	    echo "New record created successfully";
	} else {
	    echo "Error: Invalid data entry" ;
	}
}
	}

$con->close();	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add and Remove</title>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/add&remove.css">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="footer, address, phone, icons" />

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/button.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<link rel="stylesheet" href="css/footer.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
	
</head>
<body >
	<!--*************************************************Remove Admin******************************************************-->
		 <div class="col-12 column">
			 <div class="col-6 colom1">
				<div>

					<h2> <i class=
						"glyphicon glyphicon-remove-sign"></i> Remove Admin</h2>
					<form action="Add_and_Remove.php" method=POST>
						<label for="uid">Admin ID</label>
							<input type="number" name="uid" required class ="form-control">
					<br>
					<input type="submit" name="delete" value="Delete" class="clear"><br>
				</form>
				</div>
			</div>

<!--*********************************************  Add Admin**************************************************-->
				<div class="col-6 colom3">
				<div>
					
					<h2> <i class="glyphicon glyphicon-plus-sign"></i> Add Admin</h2>
					<form action="Add_and_Remove.php" method ="POST">
				<label for="nwi">Name with Initials</label>
							<input type="text" name="nwi" required class ="form-control"  pattern= "^[a-zA-Z ]*$" title ='Person Name' placeholder="Enter Name With Initials">
						<label for="nic">NIC</label>
							<input type="text" name="nic" required class ="form-control" pattern='^[0-9]{9}[vVxX]$' title='NIC number(Format:xxxxxxxxxV)' placeholder="Enter NIC Number">
						<label for="email">Email</label>
							<input type="email" name="email" required class ="form-control" placeholder="Enter Email Address" title='(format: xxx@xxx.xxx)'  pattern="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/">
						<label for="Address">Address</label>
							<input type="text" name="address" required class ="form-control">
						<label for="Phone">Phone No</label>
					
						<input type='tel' name="phone" required class ="form-control" pattern="[0-9]{10}" title='Phone Number (Format: 070 000 0000)' placeholder="Enter Phone Number">
						 	<br>
						<input type="submit" name="add" value="Add" class="submit">
						<input type="reset" name="clear" value="Clear" class="clear"><br>
					</form>

				</div>
			</div>
		</div>
 
<footer class="footer-distributed">
      <div class="footer-center">
          <div>
          <i class="fa fa-map-marker"></i>
          <p>DSP Group Micro Credit<br> Mahiyanganaya</p>
        </div>
        <div>
          <i class="fa fa-phone"></i>
          <p>+94 55 455 4555</p>
        </div>
        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="mailto:support@company.com">dsp@company.com</a></p>
        </div>
        
      </div>

      <div class="footer-left">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2283057070813!2d81.07561229554683!3d6.982363167274395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae4618a1a9fec37%3A0x1dd900702229654b!2sUva+Wellassa+University!5e0!3m2!1sen!2slk!4v1511197231475"  width="90%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <div class="footer-right">
        <div class="footer-icons">
          <a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
          
      </div>

      </div>

    </footer>
</body>
</html>
