<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="footer, address, phone, icons" />

	
	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

<style type="text/css">
  * {
    box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.card {
    float: left;
    width: 33.33%;
    padding: 10px;
     /* Should be removed. Only for demonstration */
}

.row {
    
	width:100%; 

}
/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
	

}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .card {
        width: 100%;
    }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 33.33%;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}


</style>
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/button.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/footer.css">

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
  <a href="#about">Home</a>
  


</div>
<div class="headimg">
  <img src="./images/slide3.jpg" >
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




<h1 style="text-align: center;">Loan Services</h1>
<h3 style="text-align: center;">Three easy loan services and apply methods.</h3>




<div class="row" style="margin-bottom: 10vh;">

  
  	<div class="card">
	  <img src="images/personal.jpg" alt="Denim Jeans" style="width:100%">
	  <h1>Personal Loan</h1>
	 	<br>
	  <p>The personal lonas.The personal lonasThe personal lonasThe personal lonasThe personal lonas.The personal lonas.The personal lonasThe personal lonasThe personal lonasThe personal lonas</p>
	  
	  <form>
	  	<input type="submit" name="fill" value="Apply Now" formaction="LoanApplication.php" style="width:100%;padding: 20px;">
	  </form>
	</div>

	<div class="card">
	  <img src="images/business.jpg" alt="Denim Jeans" style="width:100%">
	  <h1>Business Loan</h1>
	  <br>
	  <p>The personal lonas.The personal lonasThe personal lonasThe personal lonasThe personal lonas.The personal lonas.The personal lonasThe personal lonasThe personal lonasThe personal lonas</p>
		  <form>
	  	<input type="submit" name="fill" value="Apply Now" formaction="LoanApplication.php" style="width:100%;padding: 20px;">
	  </form>
	</div>
	
	<div class="card">
	  <img src="images/housing.jpg" alt="Denim Jeans" style="width:100%">
	  <h1>Housing Loan</h1>
	  <br>
	  <p>The personal lonas.The personal lonasThe personal lonasThe personal lonasThe personal lonas.The personal lonas.The personal lonasThe personal lonasThe personal lonasThe personal lonas</p>
		  <form>
	  	<input type="submit" name="fill" value="Apply Now" formaction="LoanApplication.php" style="width:100%;padding: 20px;">
	  </form>
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
