<?php
if(isset($_POST["Add"])){ 


   



function addcustomer($userName,$conn){
    //require_once("connection.php");
    $sql = "INSERT INTO customer (userName)
    VALUES ('$userName')";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully in customer<br>";
        //header("location:addsucceed.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} 

function addAdmin($userName,$email,$conn){
    //require_once("connection.php");
    $sql = "INSERT INTO admin (userName,email)
    VALUES ('$userName','$email')";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully in admin<br>";
        //header("location:addsucceed.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} 


function addOfficer($userName,$email,$conn){
    //require_once("connection.php");
    $sql = "INSERT INTO officer (userName,email)
    VALUES ('$userName','$email')";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully in officer<br>";
        //header("location:addsucceed.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


function addCC($userName,$email,$conn){
    //require_once("connection.php");
    $sql = "INSERT INTO cashcollector (userName,email)
    VALUES ('$userName','$email')";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully in cashcollector<br>";
        //header("location:addsucceed.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


function addManager($userName,$email,$conn){
    //require_once("connection.php");
    $sql = "INSERT INTO manager (userName,email)
    VALUES ('$userName','$email')";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully in manager<br>";
        //header("location:addsucceed.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function addlogin($category,$userName,$conn,$password){
    //require_once("connection.php");
    $sql = "INSERT INTO login (userCategory, userName, password)
    VALUES ('$category', '$userName', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("location:addsucceed.php");
        //echo "New record created successfully in login<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


//** */checking for existed users*********
    $userName=$_POST['userName'];
    require_once("connection.php");
    $sql = "SELECT* FROM login where userName='$userName'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
       echo "<h3>User Name is Already Used</h3>";
    } 
    
    else {//************if users are not existed**** */

        //echo "OK";
        require_once("connection.php");
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password=substr( str_shuffle( $chars ), 0, 8 );
        $userName=$_POST['userName'];
        $category=$_POST['category'];
        $email=$_POST['email'];
        session_start();
        $_SESSION['userName']=$_POST['userName'];
        $_SESSION['category']=$_POST['category'];
        $_SESSION['email']=$_POST['email'];
        $_SESSION['password']=$password;
        

//***********functions calling********* */          
        addlogin($category,$userName,$conn,$password);
        
        if($category=="Admin"){
            addAdmin($userName,$email,$conn);
        }
        
        if($category=="Manager"){
            addManager($userName,$email,$conn);
        }

        if($category=="Officer"){
            addOfficer($userName,$email,$conn);
        }

        if($category=="Cash Collector"){
            addCC($userName,$email,$conn);
        }

        if($category=="Customer"){
            //addcustomer($userName,$conn);
        }
      


    }

}//end of isset

    function addloan($loantype,$paymentMethods,$interestRate,$conn){

        
        $sql = "INSERT INTO loan (loantype,paymentMethods,interestRate) VALUES ('$loantype','$paymentMethods','$interestRate')";
       
        if ($conn->query($sql) === TRUE) {
        echo "New Loan was added Sucessfully";
        } 
        else{
            echo "Something Went wrong!!!";
        }
    }

    if(isset($_POST["AddLoan"])){ 

        $loantype=$_POST['loantype'];
        $paymentMethods=$_POST['paymentMethods'];
        $interestRate=$_POST['interestRate'];
        require_once("connection.php");
        addloan($loantype,$paymentMethods,$interestRate,$conn);
    }

    if(isset($_POST["search"])){ 

        $userName=$_POST['nic'];

  
        require_once("connection.php");
        $sql = "SELECT* FROM login WHERE userName='$userName'";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        $NIC=$row["userName"];
        $userCategory=$row["userCategory"];
        $uid=$row["userId"];

        if ($result->num_rows > 0) {
            //echo "ok";
            session_start();
            $_SESSION['uid']=$uid;
            $_SESSION['uname']=$_POST['nic'];
            $_SESSION['ucat']=$userCategory;
             header("location:editusers.php");

        } else {
           // echo "User doesnt existed: ";
            echo "<script>window.alert('User doesnt existed');</script>";
        }
    

    
}    


?>



<!DOCTYPE html>
<html>
<head>
    <style>
    * {
        box-sizing: border-box;
        }

body{
    background-color:#f2f2f2;
    
    background-size: cover;
}

        .regforms{
            margin-top:30px;
        }

        .customorform {
        float:left;
        width:50%;
 
        }
        .staffform {
        
        float:left;
        width:50%;
 
        }
        form{
            margin-left:80px;
            width:70%;
            margin-bottom:50px;
        }
        h2{
            text-align:center;
        }
        h3{
            text-align:center;
            color:red;
        }
        .chead{
            margin-left:80px;
            font-size:24px;
        }
        input[type=submit]{
            width: auto;
            background-color: #009999;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        } 
        input[type=submit]:hover {
        background-color:#2eb8b8;
        }
        .loanform{
            width:50%;
            float:left;
        }
        .viewbtns{
            width:50%;
            float:left;
        
        }

        .addloanbottom{
            width:100%;
        }

        @media only screen and (max-width:620px) {
            /* For mobile phones: */
            .customorform, .staffform,.loanform,.viewbtns {
                width:100%;
            }
        }
    </style>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body style="background-color:white;">

     <?php require_once("header.php"); ?>

    <p class="head" style="font-size: 20px;margin: 10px;padding-left: 10px;"><i class="glyphicon glyphicon-user"></i> Administrator</p>
    <?php require_once("bartest.php"); ?>
<div class="regforms">

    <div class="customorform">
        <p class="chead"><i class="glyphicon glyphicon-thumbs-up"></i> Customer Registrations<p>
        <form action="admin.php" method="POST">
            
            <input type="hidden" name="category" value="Customer" class="form-control">
            User Name:<br>
            <input type="text" name="userName" class="form-control" placeholder="Please Enter Customer NIC Number" pattern='^[0-9]{9}[vVxX]$' title="xxxxxxxxxV" required><br>
            Email:<br>
            <input type="email" name="email" class="form-control" placeholder="Customer Email Address" required><br>
            <input type="submit" name="Add" Value="Add User" onclick="return confirm('Do you need add this User?');"><br>
        </form>
    </div>

    <div class="staffform">
        <p class="chead"><i class="glyphicon glyphicon-briefcase"></i> Staff Registrations<p>
        <form action="admin.php" method="POST">
            Category:<br>
            <select name="category" class="form-control">
                        <option value="Admin">Admin</option>
                        <option value="Manager">Manager</option>
                        <option value="Officer">Officer</option>
                        <option value="Cash Collector">Cash Collector</option>
                        </select><br>
            User Name:<br>
            <input type="text" name="userName" class="form-control" placeholder="Please Enter User's Nic Number" required><br>
            Email:<br>
            <input type="email" name="email" class="form-control" placeholder="Please Enter User,s Email Address"  required><br>
            <input type="submit" name="Add" Value="Add User" onclick="return confirm('Do you need add this User?');"><br>
        </form>
    </div>

</div>

<div class="addloanbottom">
    <div class="loanform">
        <p class="chead"><i class="glyphicon glyphicon-usd"></i> Add New Loan<p>
          
            <form action="admin.php" method="POST" autocomplete="on" >
                Loan Type:<br> <input type="text" name="loantype" class="form-control" required><br/>
                Payment Method:<br> <input type="text" name="paymentMethods" class="form-control" required><br/>
                Interest Rate:<br> <input type="number" name="interestRate" autocomplete="off"  maxlength="2" min="1" max="25"  class="form-control" placeholder="Enter Numbers Only" required><br/>
                <input type="submit" value="Add Loan" name="AddLoan" onclick="return confirm('Do you need add this Loan?');">
            </form>
    </div>

    <div class="viewbtns">
        <p class="chead"><i class="glyphicon glyphicon-list-alt"></i> View Tables<p>
        <form action="." method="POST">
            <input type="submit" value="Customers" formaction="customerlist.php">
            <input type="submit" value="Officers" formaction="officerlist.php">
            <input type="submit" value="Cash Collectors" formaction="cashcollectorlist.php">
            <input type="submit" value="Manager" formaction="managerlist.php">
            <input type="submit" value="View Loan Details" formaction="loandetails.php">
        </form>

         <p class="chead"><i class="glyphicon glyphicon-eye-open"></i> View Users</p>
        <form action="admin.php" method="POST">
            NIC Number:<br>
            <input type="text" name="nic" class="form-control" placeholder="Enter NIC number here" required><br>
            <input type="submit" name="search" value="Search">

        </form>

    </div>

</div>

</body>
</html>


    
