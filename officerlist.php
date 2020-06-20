<!DOCTYPE <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./css/userlists.css">

<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, address, phone, icons" />

	
	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
   


</head>
<body>


    <form action="." method="POST">
            <input type="submit" value="Customers" formaction="customerlist.php">
            <input type="submit" value="Officers" formaction="officerlist.php">
            <input type="submit" value="Cash Collectors" formaction="cashcollectorlist.php">
            <input type="submit" value="Manager" formaction="managerlist.php">
            <input type="submit" value="Admin Home" formaction="admin.php">
    </form>


<!--*******************table****************-->
<table class="masterlist">
    <tr>
        <th>Officer ID</th>
        <th>User Name</th>
        <th>E mail Add.</th>
        <th>Remove</th>
       <!-- <th>Edit Loan</th>-->
    </tr>

    <?php

    require_once("connection.php");

    $sql="SELECT* FROM officer";
    $result=$conn->query($sql);

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            echo "<tr><td>".$row["officerId"]."</td><td>".$row["userName"]."</td><td>".$row["email"]."</td><td>"
            ."<a href='bremoveofficer.php?officerId=$row[officerId]'>Remove</a>"."</td>";
        }
        echo "</table>";
    }
        else{
            //echo "0 result";
    }
    $conn-> close();
    ?>



</table><br><br>

</body>

<!--**************footer**************-->
<!-- The content of your page would go here. -->

<footer class="footer-distributed">

<div class="footer-left">
    
     <img src="images/logo.png" alt="LOGO" style="width:140px;height:90px;"> 
    <br>
    <p class="footer-company-about">
        <span>About the company</span>
        Sample text.Sample textSample textSample textSample textSample textSample textSample textSample 
    </p>
</div>

<div class="footer-center">

    <div>
        <i class="fa fa-map-marker"></i>
        <p><span>No 00, abcd</span> Mahiyanganaya</p>
    </div>

    <div>
        <i class="fa fa-phone"></i>
        <p>055 1234567</p>
    </div>

    <div>
        <i class="fa fa-envelope"></i>
        <p><a href="mailto:support@company.com">dsp@company.com</a></p>
    </div>

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


</html>