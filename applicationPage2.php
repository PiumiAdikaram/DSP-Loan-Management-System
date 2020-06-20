<?php 
// Function for Add Button
   if (isset($_POST["add"])){ 
    //customer table
    $fullName  = $_POST["fname"];
    $nameWithInitials  = $_POST["name"];
    $nic     = $_POST["nic"];
    $dob      = $_POST["dob"];
    $email= $_POST["email"];
    $phoneNumber  = $_POST["pnumber"];
    $addres  = $_POST["address"];
    $city=$_POST["city"];

    $employeeName  = $_POST["empName"];
    $designation  = $_POST["desig"];
    $bSalary  = $_POST["bSalary"];
    $totalIncome  = $_POST["income"];
    //gurantee table
    $grelationship  = $_POST["grelationship"];
    $gname  = $_POST["gname"];
    $gnic  = $_POST["gnic"];
    $goccupation  = $_POST["goccupation"];
    $gmobile  = $_POST["gmobile"];
    //customer loan table
    $lamount  = $_POST["lamount"];
    $pmethod  = $_POST["pmethod"];
    //$selected_val = $_POST['Color']; 
    $pperiod  = $_POST["pperiod"];
    $lpurpose  = $_POST["lpurpose"];


   

    require_once('connection.php');
      $query = "INSERT INTO customer (fullName,nameWithInitials,nic,dateOfBirth,email,permanentAddress,mobileNo,empName,designation,bSalary,monthlyIncome,loanPurpose,city) VALUES ('$fullName','$nameWithInitials','$nic','$dob','$email','$addres','$phoneNumber','$employeeName','$designation','$bSalary','$totalIncome','$lpurpose','$city')";

    if (mysqli_query($conn, $query)) {
       $last_id = $conn->insert_id;
       echo "New record created successfully";
       //echo ;
       $query2 = "INSERT INTO customerloandetails (appliedLoanDuration ,appliedLoanAmount,customerId ,appliedMethod,loanType) VALUES ('$pperiod','$lamount','$last_id','$pmethod','Personal Loan')";
       if (mysqli_query($conn, $query2)){
          echo "New record update to loan details";
       }else{
           echo "Error loan details". $conn->error ;
           echo "<br>";
       }
       

       $query3 = "INSERT INTO guaranteedetails (gNic ,gName,gRelationship ,gMobileNumber,occupation,customerID) VALUES ('$grelationship','$gname','$gnic','$goccupation','$gmobile','$last_id')";
       if (mysqli_query($conn, $query3)){
          echo "New record update to gurantee details";
       }else{
             echo "Error gurantee details". $conn->error ;
             echo "<br>";
       }
    } else {
        echo "Error customer". $conn->error ;
        echo "<br>";
    }
  
  $conn->close();
 
}
  
?>






<!DOCTYPE html>
<html lang="en">
<head>
<title>Apllication</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/footer.css">
  <style>
* {
    box-sizing: border-box;
}

/* Create four equal columns that floats next to each other */
.column {
    float: left;
    width: 50%;
    padding: 5px;
   
}
input[type=text]{
  width:250%;
  padding:5px;
}
/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

@media only screen and (max-width:786px) {
  /* For mobile phones: */
  [class*="column"] {
    width: 100%;
  }
</style>
 
</head>
<body>




<img src="images/h5.jpeg" alt="Italian Trulli" width="100%" height="400px">

 <div class="container" class="form">
  <div class="row">
  <form action="applicationPage2.php" method="POST">
    <h1>Personal Loans</h1>
    <div class="row1">
    <div class="column"> 
        
      <table >
        <tr><td> <h2>Personal Details :</h2></td></tr>
        <tr><td><select>
          <option value="mr">Mr.</option>
          <option value="mrs">Mrs.</option>
          <option value="ms">Ms.</option>
          <option value="rev">Rev.</option>
        </select> </td></tr>
        <tr><td>Name in Full:
        <td><input type="text" name="fname"> </tr>
        <tr><td>Name with Initials:
        <td><input type="text" name="name"> </tr>
        <tr><td>NIC:
        <td><input type="text"  name="nic"> </tr>
        <tr><td>Date of Birth:
        <td><input type="text"  name="dob"> </tr>
        <tr><td>Email Address:
        <td><input  type="text"  name="email"> </tr>
        <tr><td>Contact No:
       <td><input placeholder="Personal" type="text"  name="pnumber"> </tr>
        <tr><td>City:</td>
        <td> <!--<input  type="text"  name="pmethod">-->
            <select name="city">
                <option value="Mahiyanganaya">Mahiyanganaya</option>
                <option value="Badulla">Badulla</option>
              </select>
        </td></tr>
        <tr><td>Address:</td>
        <td><input  type="text"  name="address"> </td></tr>
      </table>  
     </div>
     
     <div class="column">
        <h2>Employment Details:</h2>
        <table >
       <tr><td> Name of Employer:</td>
          <td><input  type="text"  name="empName">  </td></tr>
        <tr><td>Designation:</td>
         <td><input  type="text"  name="desig">  </td><br></tr>
        
        <tr><td><h2>Salary Details:</h2></td></tr>  
        <tr><td>Basic Salary:</td>
          <td><input  type="text"  name="bSalary">  </td></tr>
        <tr><td>Total income:</td>
          <td><input  type="text"  name="income">  </td></tr>
        </table>
      </div>
      </div>
      <hr>
      <div class="row2">
      <div class="column">
        
        <table >
        <tr><td> <h2>Guarantee Details</h2></td></tr>
        <tr>
          <td>Relationship:</td>
          <td> <input  type="text"  name="grelationship">  </td></tr>

        <tr><td>Name with Initials:</td>
        <td> <input  type="text"  name="gname">  </td></tr>
        <tr><td>NIC:</td>
        <td> <input  type="text"  name="gnic">  </td></tr>
       <tr><td> Occupation:</td>
        <td> <input  type="text"  name="goccupation">  </td></tr>
        <tr><td>Mobile Number:</td>
        <td> <input  type="text"  name="gmobile">  </td></tr>
        </table>
      </div>

      <div class="column">
        
        <table >
        <tr><td> <h2>Loan Details :</h2></td></tr>
        <tr><td>Loan Purpose:</td>
        <td> <input  type="text"  name="lpurpose">  </td></tr>
        <tr><td>Loan Amount:</td>
        <td> <input  type="text"  name="lamount">  </td></tr>
        <tr><td>Payment Method:</td>
        <td> <!--<input  type="text"  name="pmethod">-->
            <select name="pmethod">
                <option value="Weekly">Weekly</option>
                <option value="Monthly">Monthly</option>
              </select>
        </td></tr>
        <tr><td>Loan Duration:</td>
         <td><input  type="text"  name="pperiod" placeholder="No of months">   </td></tr>
      </div>
    </table> 
      
       <input type="submit"  name="add" value="Submit">
    </div>    
   </form>
   </div>
  </div>
  
 

 <footer class="footer-distributed">
      <div class="footer-left">
        <img src="images/logo.png" alt="LOGO" style="width:140px;height:90px;"> 
        <br>
        <p class="footer-company-about">
          <span>About the company</span>
          Sample text.Sample textSample textSample textSample textSample textSample textSample textSample 
         
      </div>

      <div class="footer-center">
        <div>
          <i class="fa fa-map-marker"></i>
           <span>No 00, abcd</span> Mahiyanganaya 
        </div>
        <div>
          <i class="fa fa-phone"></i>
           055 1234567 
        </div>
        <div>
          <i class="fa fa-envelope"></i>
           <a href="mailto:support@company.com">dsp@company.com</a> 
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


  </body>
  </html>