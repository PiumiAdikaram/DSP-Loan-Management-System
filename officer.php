<?php 

	$headers ="Mail";
	if(isset($_POST["send"])){

		include "classes/class.phpmailer.php";
		$mail=new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug=1;
		$mail->SMTPAuth=true;
		$mail->SMTPSecure='ssl';
		$mail->Host="smtp.gmail.com";
		$mail->Port=465;
		$mail->IsHTML(true);
		$mail->Username=("nemodorylab2018@gmail.com");
		$mail->Password="computerlab";
		$mail->SetFrom("nemodorylab2018@gmail.com");
		$mail->Subject=$_POST["subject"];
		$mail->Body=$_POST["message"];
		$mail->AddAddress($_POST["to"]);
		if(!$mail->Send()){
				echo "Mailer Erro";
			}
		else{
				echo "Msg snt";
			}

	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Officer</title>
	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="footer, address, phone, icons" />

		
	<link rel="stylesheet" type="text/css" href="css/officer.css">

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/button.css">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/footer.css">
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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





	<div class="column col-12">
		<div class="col-6 colom3">
			<h2><i class= "glyphicon glyphicon-envelope"></i> Mail Box</h2>
			<form action ="officer.php" method="POST">
				<label for ="email">Email Address:</label>
					<input type="email" name="to" required class ="form-control" placeholder="Enter Email Address" title='(format: xxx@xxx.xxx)' pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$">
				<label for ="subject">Subject:</label>
					<input type="text" name="subject" required class ="form-control">
				<label for ="message">Message:</label><br>
				<textarea rows="4" cols="50" placeholder="Your message here..." required name="message" class="msg form-control">
					
				</textarea>
				<br>

				<input type="submit"  value="Send Email" name="send">
			</form>

		</div>
		<div class="col-6 colom3">
			<h2> <i class= "glyphicon glyphicon-search"></i> Check In</h2>
			<form>
				<label for ="nic">NIC:</label>
					<input type="text" name="NIC" class ="form-control" pattern='^[0-9]{9}[vVxX]$' placeholder="Enter NIC Number">
				<label for ="area">Area:</label>
					<select class ="form-control">
					<option>Badulla</option>
					<option>Mahiyanganaya</option>
					</select>
				<label for="ccid"> Cash Collector ID: </label>
					<input type="text" name="ccid" class ="form-control">
				<br>
			<input type="submit"  value="Arrears" class="btn1" formaction="Arrears.html">
			<input type="submit"  value="Request Application"class="btn2" formaction="request.php"><br>
			
			</form>
		</div>
		
		</form>
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