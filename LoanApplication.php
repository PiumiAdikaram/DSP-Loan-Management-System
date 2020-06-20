
<head>
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/button.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/footer.css">
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

</head>
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
<?php 
//http://codingcyber.com/creating-multistep-form-processing-using-php-228/
//session_start();
if(isset($_POST['sign_up'])){
    if($_POST['sign_up'] == 'Step 1'){
        if (isset($_POST['number'])) {
            $_SESSION['number'] = $_POST['number'];
        }
        
    }
 
    if($_POST['sign_up'] == "Step 2"){
        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['nic'] = $_POST['nic'];
        $_SESSION['dob'] = $_POST['dob'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['pnumber'] = $_POST['pnumber'];
        $_SESSION['city'] = $_POST['city'];
        $_SESSION['address'] = $_POST['address'];
        $_SESSION['gender'] = $_POST['gender'];

    }
    if($_POST['sign_up'] === 'Step 3' && $_SESSION['number']=="bLoan"){
        $_SESSION['bAddress'] = $_POST['bAddress'];
        $_SESSION['bIncome'] = $_POST['bIncome'];
        $_SESSION['otherIncome'] = $_POST['otherIncome'];
        
    }

    elseif($_POST['sign_up'] == "Step 3"){
        
        $_SESSION['empName'] = $_POST['empName'];
        $_SESSION['desig'] = $_POST['desig'];
        $_SESSION['bSalary'] = $_POST['bSalary'];
        $_SESSION['income'] = $_POST['income'];
    }
     

    if($_POST['sign_up'] == "Step 4"){
        
        $_SESSION['grelationship'] = $_POST['grelationship'];
        $_SESSION['gname'] = $_POST['gname'];
        $_SESSION['gnic'] = $_POST['gnic'];
        $_SESSION['goccupation'] = $_POST['goccupation'];
        $_SESSION['gmobile'] = $_POST['gmobile'];
       
        
    }
 
    if($_POST['sign_up'] === 'Submit' && $_SESSION['number']=="bLoan"){

        $_SESSION['lpurpose'] = $_POST['lpurpose'];
        $_SESSION['lamount'] = $_POST['lamount'];
        $_SESSION['pMethod'] = $_POST['pMethod'];
        $_SESSION['pDuration'] = $_POST['pDuration'];
      
      require_once('connection.php');
      $query = "INSERT INTO customer (fullName,nameWithInitials,nic,dateOfBirth,email,permanentAddress,mobileNo,empName,designation,bSalary,monthlyIncome,loanPurpose,city,gender) 
      VALUES (
      '{$_SESSION['fname']}' ,
      '{$_SESSION['name']}',
      '{$_SESSION['nic']}',
      '{$_SESSION['dob']}',
       '{$_SESSION['email'] }',
      ' {$_SESSION['address']}',
      ' {$_SESSION['pnumber'] }',
       ' {$_SESSION['empName'] }',
       '{$_SESSION['desig'] }',
       ' {$_SESSION['bSalary']}', 
       '{$_SESSION['income'] }',
       '{$_SESSION['lpurpose']}',
       '{$_SESSION['city']}',
       '{$_SESSION['gender']}' )";

    if (mysqli_query($conn, $query)) {
       $last_id = $conn->insert_id;
       echo "New record created successfully";
       //echo ;
       $query2 = "INSERT INTO customerloandetails (appliedLoanDuration ,appliedLoanAmount,customerId ,appliedMethod,loanType) VALUES (
        '{$_SESSION['pDuration']}',
        '{$_SESSION['lamount']}',
        '$last_id',
        '{$_SESSION['pMethod']}',
        '{$_SESSION['number']}')";
       if (mysqli_query($conn, $query2)){
          echo "New record update to loan details";
       }else{
           echo "Error loan details". $conn->error ;
           echo "<br>";
       }
       

       $query3 = "INSERT INTO guaranteedetails (gNic ,gName,gRelationship ,gMobileNumber, occupation, customerID) VALUES (
        '{$_SESSION['gnic']}',
        '{$_SESSION['gname']}',
        '{$_SESSION['grelationship']}', 
        '{$_SESSION['gmobile']}',
        '{$_SESSION['goccupation']}',
        '$last_id' )";

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


    if($_POST['sign_up'] == "Submit"){

        $_SESSION['lpurpose'] = $_POST['lpurpose'];
        $_SESSION['lamount'] = $_POST['lamount'];
        $_SESSION['pMethod'] = $_POST['pMethod'];
        $_SESSION['pDuration'] = $_POST['pDuration'];
      
      require_once('connection.php');
      $query4 = "INSERT INTO customer (fullName,nameWithInitials,nic,dateOfBirth,email,permanentAddress,mobileNo,empName,designation,bSalary,monthlyIncome,loanPurpose,city,gender) 
      VALUES (
      '{$_SESSION['fname']}' ,
      '{$_SESSION['name']}',
      '{$_SESSION['nic']}',
      '{$_SESSION['dob']}',
       '{$_SESSION['email'] }',
      ' {$_SESSION['address']}',
      ' {$_SESSION['pnumber'] }',
       ' {$_SESSION['empName'] }',
       '{$_SESSION['desig'] }',
       ' {$_SESSION['bSalary']}', 
       '{$_SESSION['income'] }',
       '{$_SESSION['lpurpose']}',
       '{$_SESSION['city']}',
       '{$_SESSION['gender']}' )";

    if (mysqli_query($conn, $query4)) {
       $last_id = $conn->insert_id;
       echo "New record created successfully";
       //echo ;
       $query5 = "INSERT INTO customerloandetails (appliedLoanDuration ,appliedLoanAmount,customerId ,appliedMethod,loanType) VALUES (
        '{$_SESSION['pDuration']}',
        '{$_SESSION['lamount']}',
        '$last_id',
        '{$_SESSION['pMethod']}',
        '{$_SESSION['number']}')";
       if (mysqli_query($conn, $query5)){
          echo "New record update to loan details";
       }else{
           echo "Error loan details". $conn->error ;
           echo "<br>";
       }
       

       $query6 = "INSERT INTO guaranteedetails (gNic ,gName,gRelationship ,gMobileNumber, occupation, customerID) VALUES (
        '{$_SESSION['gnic']}',
        '{$_SESSION['gname']}',
        '{$_SESSION['grelationship']}', 
        '{$_SESSION['gmobile']}',
        '{$_SESSION['goccupation']}',
        '$last_id' )";

       if (mysqli_query($conn, $query6)){
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
}
?>
<!DOCTYPE html>
<html>

<head>
<title>Loan Application</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<style type="text/css">

</style>
</head>
<body>
 
<div id="innr_bx" style="text-align: center;
    ">
<?php if (empty($_POST)){ ?>

<!-- First Step -->
<form action="" method="post">
<h2>Select Loan Type</h2><br>
<select name="number" id="number">
  <option value='ploan'>Personal Loan</option> 
  <option value='bLoan'>Bussiness Loan</option>  
  <option value='hLoan'>Housing Loan</option> 
</select>
<input type="submit" name="sign_up" value="Step 1"  />
</form>
 
<!-- Second Step -->
<?php }elseif ($_POST['sign_up'] === 'Step 1'){ ?>
<form action="LoanApplication.php" method="post">
  
  
      <table >
        <tr>
          <td><h2>Step 1</h2></td>
          <td> <h2>Personal Details :</h2></td></tr>
        <tr>
          <td></td>
          <td><select name="gender">
            <option value="male">Mr.</option>
            <option value="female">Mrs.</option>
            <option value="female">Ms.</option>
          </select> </td>
      </tr>
        <tr><td>Name in Full:</td>
        <td><input type="text" name="fname" required pattern="^[A-Za-z]*$" class="form-control"></td> </tr>
        <tr><td>Name with Initials:</td>
        <td><input type="text" name="name" required class="form-control"></td> </tr>
        <tr><td>NIC:</td>
        <td><input placeholder="Plese enter the NIC" type="text" required name="nic" pattern='^[0-9]{9}[VvXx]$' title="XXXXXXXXXV" class="form-control"></td> </tr>
        <tr><td>Date of Birth:</td>
        <td><input type="date" name="dob" class="form-control"> </td></tr>
        <tr><td>Email Address:</td>
        <td><input  type="email"  name="email" class="form-control"> </td></tr>
        <tr><td>Contact No:</td>
       <td><input placeholder="07X XXXXXXX" type="tel" required name="pnumber" pattern='[0-9]{10}' title="(Format : 070 0000000)" class="form-control"> </td></tr>
        <tr><td>City:</td>
        <td> 
            <select name="city" class="form-control">
                <option value="Mahiyanganaya">Mahiyanganaya</option>
                <option value="Badulla">Badulla</option>
                <option value="Mahiyanganaya">Meegahakiula</option>
                <option value="Badulla">Kandekatiya</option>
              </select>
        </td></tr>
        <tr><td>Address:</td>
        <td><input  type="text" required  name="address" class="form-control"> </td></tr>
        <tr><td></td>
          <td><input type="submit" name="sign_up" value="Step 2"/></td>
        </tr>


      </table>  

   
</form>


<!-- Second Step for Business Loans-->
<?php }elseif ($_POST['sign_up'] === 'Step 2' && $_SESSION['number']=="bLoan"){ ?>

<form action="LoanApplication.php" method="post" class="form-control">
      <h3>Business Loan</h3>
      
      <table >
        <tr>
          <td><h2>Step 1</h2></td>
          <td><h2>Personal Details :</h2></td></tr>
        <tr>
          <td></td>
          <td><select name="gender" >
            <option value="male">Mr.</option>
            <option value="female">Mrs.</option>
            <option value="female">Ms.</option>
          </select> </td>
      </tr>
        <tr><td>Name in Full:</td>
        <td><input type="text" name="fname" required pattern="^[A-Za-z]*$" value="<?php echo $_SESSION['fname'] ?>" class="form-control"></td> </tr>
        <tr><td>Name with Initials:</td>
        <td><input type="text" name="name" required value="<?php echo $_SESSION['name'] ?>" class="form-control"></td> </tr>
        <tr><td>NIC:</td>
        <td><input placeholder="Plese enter the NIC" type="text" required name="nic" pattern='^[0-9]{9}[VvXx]$' title="XXXXXXXXXV" value="<?php echo $_SESSION['nic'] ?>" class="form-control"></td> </tr>
        <tr><td>Date of Birth:</td>
        <td><input type="date" name="dob" value="<?php echo $_SESSION['dob'] ?>" class="form-control"> </td></tr>
        <tr><td>Email Address:</td>
        <td><input  type="email"  name="email" value="<?php echo $_SESSION['email'] ?>" class="form-control"> </td></tr>
        <tr><td>Contact No:</td>
       <td><input placeholder="07X XXXXXXX" type="tel" required name="pnumber" pattern='[0-9]{10}' title="(Format : 070 0000000)" value="<?php echo $_SESSION['pnumber'] ?>" class="form-control"> </td></tr>
        <tr><td>City:</td>
        <td> 
            <select name="city">
                <option value="Mahiyanganaya">Mahiyanganaya</option>
                <option value="Badulla">Badulla</option>
                <option value="Mahiyanganaya">Meegahakiula</option>
                <option value="Badulla">Kandekatiya</option>
              </select>
        </td></tr>
        <tr><td>Address:</td>
        <td><input  type="text" required  name="address" value="<?php echo $_SESSION['address'] ?>" class="form-control"> </td></tr>
      


        <tr><td><h2>Step 2</h2></td>
          <td><h2>Business Details</h2></td>
        </tr>

    
        
       <tr><td>Business type:</td>
          <td> 
            <select name="business">
                <option value="Business">Business</option>
                <option value="Self employee">Self employee</option>
                <option value="Other">Other</option>
              </select>
        </td>
      </tr>
        <tr><td>Business Address:</td>
         <td><input  type="text"  name="bAddress" class="form-control" > </td><br></tr>
        
        <tr><td><h2>Income Details:</h2></td></tr>  
        <tr><td>Business income:</td>
          <td><input  type="text"  name="bIncome" class="form-control" ></td></tr>
        <tr><td>Other income:</td>
          <td><input  type="text"  name="otherIncome" class="form-control">  </td></tr>
          <tr><td></td><td><input type="Submit" name="sign_up" value="Step 3"></td></tr>
        </table>

        
</form>  


<!--Third Step for Personal Loans and Housing loans-->
<?php }elseif ($_POST['sign_up'] === 'Step 2'){ ?>
<form action="LoanApplication.php" method="post">
      
      <table >
        <tr>
          <td><h2>Step 1</h2></td>
          <td><h2>Personal Details :</h2></td></tr>
        <tr>
        <tr>
          <td></td>
          <td><select name="gender">
            <option value="male">Mr.</option>
            <option value="female">Mrs.</option>
            <option value="female">Ms.</option>
          </select> </td>
      </tr>
        <tr><td>Name in Full:</td>
        <td><input type="text" name="fname" required pattern="^[A-Za-z]*$" value="<?php echo $_SESSION['fname'] ?>" class="form-control"></td> </tr>
        <tr><td>Name with Initials:</td>
        <td><input type="text" name="name" required value="<?php echo $_SESSION['name'] ?>" class="form-control"></td> </tr>
        <tr><td>NIC:</td>
        <td><input placeholder="Plese enter the NIC" type="text" required name="nic" pattern='^[0-9]{9}[VvXx]$' title="XXXXXXXXXV" value="<?php echo $_SESSION['nic'] ?>" class="form-control"></td> </tr>
        <tr><td>Date of Birth:</td>
        <td><input type="date" name="dob" value="<?php echo $_SESSION['dob'] ?>" class="form-control"> </td></tr>
        <tr><td>Email Address:</td>
        <td><input  type="email"  name="email" value="<?php echo $_SESSION['email'] ?>" class="form-control"> </td></tr>
        <tr><td>Contact No:</td>
       <td><input placeholder="07X XXXXXXX" type="tel" required name="pnumber" pattern='[0-9]{10}' title="(Format : 070 0000000)" value="<?php echo $_SESSION['pnumber'] ?>" class="form-control"> </td></tr>
        <tr><td>City:</td>
        <td> 
            <select name="city">
                <option value="Mahiyanganaya">Mahiyanganaya</option>
                <option value="Badulla">Badulla</option>
                <option value="Mahiyanganaya">Meegahakiula</option>
                <option value="Badulla">Kandekatiya</option>
              </select>
        </td></tr>
        <tr><td>Address:</td>
        <td><input  type="text" required  name="address" value="<?php echo $_SESSION['address'] ?>" class="form-control"> </td></tr>
      
      <tr><td><h2>Step 2</h2></td>
       <td><h2>Employment Details:</h2> </td></tr>

    
    
       <tr><td> Name of Employer:</td>
          <td><input  type="text" required name="empName" pattern="^[A-Za-z]*$" class="form-control">  </td></tr>
        <tr><td>Designation:</td>
         <td><input  type="text" required name="desig" class="form-control">  </td><br></tr>
        
        <tr><td><h2>Salary Details:</h2></td></tr>  
        <tr><td>Basic Salary:</td>
          <td><input  type="text" required name="bSalary" class="form-control">  </td></tr>
        <tr><td>Total income:</td>
          <td><input  type="text" required name="income" class="form-control">  </td></tr>
          <tr><td></td><td> <input type="Submit" name="sign_up" value="Step 3"></td></tr>

        </table>
       
</form>

<!-- Fourth Step for Business Loans-->
<?php }elseif ($_POST['sign_up'] === 'Step 3' && $_SESSION['number']=="bLoan"){ ?>

<form action="LoanApplication.php" method="post">
      
      <table >
        <tr>
          <td><h2>Step 1</h2></td>
          <td><h2>Personal Details :</h2></td></tr>
        <tr>
        <tr>
          <td></td>
          <td><select name="gender">
            <option value="male">Mr.</option>
            <option value="female">Mrs.</option>
            <option value="female">Ms.</option>
          </select> </td>
      </tr>
        <tr><td>Name in Full:</td>
        <td><input type="text" name="fname" required pattern="^[A-Za-z]*$" value="<?php echo $_SESSION['fname'] ?>" class="form-control"></td> </tr>
        <tr><td>Name with Initials:</td>
        <td><input type="text" name="name" required value="<?php echo $_SESSION['name'] ?>" class="form-control"></td> </tr>
        <tr><td>NIC:</td>
        <td><input placeholder="Plese enter the NIC" type="text" required name="nic" pattern='^[0-9]{9}[VvXx]$' title="XXXXXXXXXV" value="<?php echo $_SESSION['nic'] ?>" class="form-control"></td> </tr>
        <tr><td>Date of Birth:</td>
        <td><input type="date" name="dob" value="<?php echo $_SESSION['dob'] ?>" class="form-control"> </td></tr>
        <tr><td>Email Address:</td>
        <td><input  type="email"  name="email" value="<?php echo $_SESSION['email'] ?>" class="form-control"> </td></tr>
        <tr><td>Contact No:</td>
       <td><input placeholder="07X XXXXXXX" type="tel" required name="pnumber" pattern='[0-9]{10}' title="(Format : 070 0000000)" value="<?php echo $_SESSION['pnumber'] ?>" class="form-control"> </td></tr>
        <tr><td>City:</td>
        <td> 
            <select name="city">
                <option value="Mahiyanganaya">Mahiyanganaya</option>
                <option value="Badulla">Badulla</option>
                <option value="Mahiyanganaya">Meegahakiula</option>
                <option value="Badulla">Kandekatiya</option>
              </select>
        </td></tr>
        <tr><td>Address:</td>
        <td><input  type="text" required  name="address" value="<?php echo $_SESSION['address'] ?>" class="form-control"> </td></tr>
      
        <tr><td><h3>Step 2</h3></td></tr>
        <tr><td><h2>Business Details:</h2> </td></tr>

       
        
       <tr><td>Business:</td>
          <td> 
            <select name="business">
                <option value="Business">Business</option>
                <option value="Self employee">Self employee</option>
                <option value="Other">Other</option>
              </select>
        </td>
      </tr>
        <tr><td>Business Address:</td>
         <td><input  type="text"  name="bAddress" value="<?php echo $_SESSION['bAddress'] ?>" class="form-control">  </td><br></tr>
        
        <tr><td><h2>Income Details:</h2></td></tr>  
        <tr><td>Business income:</td>
          <td><input  type="text"  name="bIncome" value="<?php echo $_SESSION['bIncome'] ?>" class="form-control">  </td></tr>
        <tr><td>Other income:</td>
          <td><input  type="text"  name="otherIncome" value="<?php echo $_SESSION['otherIncome'] ?>" class="form-control">  </td></tr>
        
        
         <tr><td> <h2>Loan Details :</h2></td></tr>
        <tr><td>Loan Purpose:</td>
        <td> <input  type="text" required name="lpurpose" class="form-control">  </td></tr>
        <tr><td>Loan Amount:</td>
        <td> <input  type="text" required name="lamount" class="form-control">  </td></tr>
        <tr><td>Payment Method:</td>
        <td>          
              <?php
            require_once('connection.php');
              $sql="SELECT paymentMethods from loan where loantype='Business Loan'";
          $result=mysqli_query($conn,$sql);
          echo "<select id='paymentMethod' onchange='durationChange(this);' name='pMethod'>";
          echo "<option value=''>Select the loan type</option>";
          while($row=mysqli_fetch_array($result)){
            echo "<option value='".$row['paymentMethods'] ."'>". $row['paymentMethods']. "</option>";
              
          }
         echo "</select>";
        ?>
        </td></tr>
        <tr><td>Loan Duration:</td>
         <td>
          <select id="duration" name="pDuration">
                <option value="0">Loan Duration</option>
              </select>
         </td>
      </tr>
       <tr><td></td><td><input type="Submit" name="sign_up" value="Submit"></td></tr>

    </table> 
      
        
</form>  




<!-- Fourth Step for Personal Loans and Housing loans-->
<?php }elseif ($_POST['sign_up'] === 'Step 3'){ ?>
<form action="LoanApplication.php" method="post">
      
      <table >
        <tr>
          <td><h2>Step 1</h2></td>
          <td><h2>Personal Details :</h2></td></tr>
        <tr>
        <tr>
          <td></td>
          <td><select name="gender">
            <option value="male">Mr.</option>
            <option value="female">Mrs.</option>
            <option value="female">Ms.</option>
          </select> </td>
      </tr>
        <tr><td>Name in Full:</td>
        <td><input type="text" name="fname" required pattern="^[A-Za-z]*$" value="<?php echo $_SESSION['fname'] ?>" class="form-control"></td> </tr>
        <tr><td>Name with Initials:</td>
        <td><input type="text" name="name" required value="<?php echo $_SESSION['name'] ?>" class="form-control"></td> </tr>
        <tr><td>NIC:</td>
        <td><input placeholder="Plese enter the NIC" type="text" required name="nic" pattern='^[0-9]{9}[VvXx]$' title="XXXXXXXXXV" value="<?php echo $_SESSION['nic'] ?>" class="form-control"></td> </tr>
        <tr><td>Date of Birth:</td>
        <td><input type="date" name="dob" value="<?php echo $_SESSION['dob'] ?>" class="form-control"> </td></tr>
        <tr><td>Email Address:</td>
        <td><input  type="email"  name="email" value="<?php echo $_SESSION['email'] ?>" class="form-control"> </td></tr>
        <tr><td>Contact No:</td>
       <td><input placeholder="07X XXXXXXX" type="tel" required name="pnumber" pattern='[0-9]{10}' title="(Format : 070 0000000)" value="<?php echo $_SESSION['pnumber'] ?>" class="form-control"> </td></tr>
        <tr><td>City:</td>
        <td> 
            <select name="city">
                <option value="Mahiyanganaya">Mahiyanganaya</option>
                <option value="Badulla">Badulla</option>
                <option value="Mahiyanganaya">Meegahakiula</option>
                <option value="Badulla">Kandekatiya</option>
              </select>
        </td></tr>
        <tr><td>Address:</td>
        <td><input  type="text" required  name="address" value="<?php echo $_SESSION['address'] ?>" class="form-control"> </td></tr>
      

          <tr><td><h3>Step 2</h3></td></tr>
        <tr><td><h2>Employment Details:</h2> </td></tr>

        
       <tr><td> Name of Employer:</td>
          <td><input  type="text" required name="empName" pattern="^[A-Za-z]*$" value="<?php echo $_SESSION['empName'] ?>" class="form-control">  </td></tr>
        <tr><td>Designation:</td>
         <td><input  type="text" required name="desig" value="<?php echo $_SESSION['desig'] ?>" class="form-control">  </td><br></tr>
        
        <tr><td><h2>Salary Details:</h2></td></tr>  
        <tr><td>Basic Salary:</td>
          <td><input  type="text" required name="bSalary" value="<?php echo $_SESSION['bSalary'] ?>" class="form-control">  </td></tr>
        <tr><td>Total income:</td>
          <td><input  type="text" required name="income" value="<?php echo $_SESSION['income'] ?>" class="form-control">  </td></tr>
        


        <tr>
          <td> <h2>Step 3</h2></td>
          <td> <h2>Guarantee Details</h2></td></tr>
        <tr>
          <td>Relationship:</td>
          <td> <input  type="text"  name="grelationship" class="form-control">  </td></tr>

        <tr><td>Name with Initials:</td>
        <td> <input  type="text"  name="gname" class="form-control">  </td></tr>
        <tr><td>NIC:</td>
        <td> <input  type="text"  name="gnic" class="form-control">  </td></tr>
       <tr><td> Occupation:</td>
        <td> <input  type="text"  name="goccupation" class="form-control">  </td></tr>
        <tr><td>Mobile Number:</td>
        <td> <input  type="text"  name="gmobile" class="form-control">  </td></tr>
        <tr><td></td><td><input type="Submit" name="sign_up" value="Step 4"></td></tr>
        </table>
        
</form>





<!-- Last Step for Personal Loans and Housing loans-->
<?php }elseif ($_POST['sign_up'] === 'Step 4'){ ?>
<form action="LoanApplication.php" method="post">
      
      <table >
        <tr>
          <td> <h2>Step 1</h2></td>
          <td> <h2>Personal Details :</h2></td></tr>
        <tr>
          <td></td>
          <td><select name="gender">
            <option value="male">Mr.</option>
            <option value="female">Mrs.</option>
            <option value="female">Ms.</option>
          </select> </td>
      </tr>
        <tr><td>Name in Full:</td>
        <td><input type="text" name="fname" required pattern="^[A-Za-z]*$" value="<?php echo $_SESSION['fname'] ?>" class="form-control"></td> </tr>
        <tr><td>Name with Initials:</td>
        <td><input type="text" name="name" required value="<?php echo $_SESSION['name'] ?>" class="form-control"></td> </tr>
        <tr><td>NIC:</td>
        <td><input placeholder="Plese enter the NIC" type="text" required name="nic" pattern='^[0-9]{9}[VvXx]$' title="XXXXXXXXXV" value="<?php echo $_SESSION['nic'] ?>" class="form-control"></td> </tr>
        <tr><td>Date of Birth:</td>
        <td><input type="date" name="dob" value="<?php echo $_SESSION['dob'] ?>" class="form-control"> </td></tr>
        <tr><td>Email Address:</td>
        <td><input  type="email"  name="email"  value="<?php echo $_SESSION['email'] ?>" class="form-control"> </td></tr>
        <tr><td>Contact No:</td>
       <td><input placeholder="07X XXXXXXX" type="tel" required name="pnumber" pattern='[0-9]{10}' title="(Format : 070 0000000)" value="<?php echo $_SESSION['pnumber'] ?>" class="form-control"> </td></tr>
        <tr><td>City:</td>
        <td> 
            <select name="city">
                <option value="Mahiyanganaya">Mahiyanganaya</option>
                <option value="Badulla">Badulla</option>
                <option value="Mahiyanganaya">Meegahakiula</option>
                <option value="Badulla">Kandekatiya</option>
              </select>
        </td></tr>
        <tr><td>Address:</td>
        <td><input  type="text" required  name="address" value="<?php echo $_SESSION['address'] ?>" class="form-control"> </td></tr>
      
          <tr><td><h3>Step 2</h3></td></tr>
        <tr><td><h2>Employment Details:</h2> </td></tr>


        
       <tr><td> Name of Employer:</td>
          <td><input  type="text" required name="empName" pattern="^[A-Za-z]*$" value="<?php echo $_SESSION['empName'] ?>" class="form-control">  </td></tr>
        <tr><td>Designation:</td>
         <td><input  type="text" required name="desig" value="<?php echo $_SESSION['desig'] ?>" class="form-control">  </td><br></tr>
        
        <tr><td><h2>Salary Details:</h2></td></tr>  
        <tr><td>Basic Salary:</td>
          <td><input  type="text" required name="bSalary" value="<?php echo $_SESSION['bSalary'] ?>" class="form-control">  </td></tr>
        <tr><td>Total income:</td>
          <td><input  type="text" required name="income" value="<?php echo $_SESSION['income'] ?>" class="form-control">  </td></tr>
        
        <tr><td> <h2>Guarantee Details</h2></td></tr>
        <tr>
          <td>Relationship:</td>
          <td> <input  type="text"  name="grelationship" value="<?php echo $_SESSION['grelationship'] ?>" class="form-control">  </td></tr>

        <tr><td>Name with Initials:</td>
        <td> <input  type="text"  name="gname" value="<?php echo $_SESSION['gname'] ?>" class="form-control">  </td></tr>
        <tr><td>NIC:</td>
        <td> <input  type="text"  name="gnic" value="<?php echo $_SESSION['gnic'] ?>" class="form-control">  </td></tr>
       <tr><td> Occupation:</td>
        <td> <input  type="text"  name="goccupation" value="<?php echo $_SESSION['goccupation'] ?>" class="form-control">  </td></tr>
        <tr><td>Mobile Number:</td>
        <td> <input  type="text"  name="gmobile" value="<?php echo $_SESSION['gmobile'] ?>" class="form-control">  </td></tr>

         <tr>
          <td><h2>Step 3</h2></td>
          <td> <h2>Loan Details :</h2></td></tr>
        <tr><td>Loan Purpose:</td>
        <td> <input  type="text" required name="lpurpose" class="form-control">  </td></tr>
        <tr><td>Loan Amount:</td>
        <td> <input  type="text" required name="lamount" class="form-control">  </td></tr>
        <tr><td>Payment Method:</td>
        <td>          
              <?php
            require_once('connection.php');
              $sql="SELECT paymentMethods from loan where loantype='Personal Loan'";
          $result=mysqli_query($conn,$sql);
          echo "<select id='paymentMethod' onchange='durationChange(this);' name='pMethod'>";
          echo "<option value=''>Select the loan type</option>";
          while($row=mysqli_fetch_array($result)){
            echo "<option value='".$row['paymentMethods'] ."'>". $row['paymentMethods']. "</option>";
              
          }
         echo "</select>";
        ?>
        </td></tr>
        <tr><td>Loan Duration:</td>
         <td>
          <select id="duration" name="pDuration">
                <option value="0">Loan Duration</option>
              </select>
         </td>
      </tr>
      <tr><td></td><td><input type="Submit" name="sign_up" value="Submit"></td></tr>
        </table>     
</form>

 

<?php }?>
</div>



<script>
     var durationLists = new Array(2)  
     durationLists["Daily"] = ["15 days", "1 months", "3 months"]; 
     durationLists["Weekly"] = ["3 months", "6 months", "9 months"]; 
     durationLists["Monthly"] = ["6 months", "12 months", "18 months", "24 months"]; 
     
     function durationChange(selectObj) { 
     // get the index of the selected option 
     var idx = selectObj.selectedIndex; 
     // get the value of the selected option 
     var which = selectObj.options[idx].value; 
     // use the selected option value to retrieve the list of items from the countryLists array 
     cList = durationLists[which]; 
     // get the country select element via its known id 
     var cSelect = document.getElementById("duration"); 
     // remove the current options from the country select 
     var len=cSelect.options.length; 
     while (cSelect.options.length > 0) { 
     cSelect.remove(0); 
     } 
     var newOption; 
     // create new options 
     for (var i=0; i<cList.length; i++) { 
     newOption = document.createElement("option"); 
     newOption.value = cList[i];  // assumes option string and value are the same 
     newOption.text=cList[i]; 
     // add the new option 
     try { 
     cSelect.add(newOption);   
     } 
     catch (e) { 
     cSelect.appendChild(newOption); 
     } 
     } 
     } 





     

</script>



</body>
</html>

<!---------------footer------------------------------->
<!----------
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

    </footer>---->