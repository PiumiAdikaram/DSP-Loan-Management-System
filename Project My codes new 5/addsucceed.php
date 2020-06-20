

<?php
//**********session***************
    session_start();
    $_Name=$_SESSION['userName'];
    $_UserCatagory=$_SESSION['category'];
    $_UserEmail=$_SESSION['email'];
    $password=$_SESSION['password'];
    
 ?>

<div class="userdetails">
    <p class="newdetails" style="font-size:20px; margin-top:60px;"><?php echo $_Name; ?> has been added Succefully as a <?php echo $_UserCatagory; ?> </p>
<div class="senddet" style="font-size:15px;">
    <form>
        Username<br>
        <input type="text" value="<?php echo $_Name; ?>"><br>
        Password<br>
        <input type="text" value="<?php echo $password; ?>"><br>
    </form>
</div>

</div>



<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
        <style>
            
            
            

input[type=text], select {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 30%;
    background-color: #009999;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=submit]:hover {
        background-color:#2eb8b8;
    }

p{
    padding:10px 10px;
    text-align:center;
}
.col-5 {
    width: 100%;
    background-color: #ccffeb;
    color: black;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    
    border-radius: 5px;
    padding: 30px;
    text-align:center;
}
h1 {
    border-radius: 5px;
    background-color:  #d6f5d6;
    padding: 30px;
    text-align:center;
}

h2{
    text-align:center;
    font-size:15px;
}

form{
    text-align:center;
}

        </style>
    </head>

<body>




</body>

</html>

 <?php   



//**********Email Sending code**********  

if(isset($_POST["submit"])){
 
   
        $to = $_UserEmail;
        $subject = 'DSP Group Micro Credits';
        $message = "Your Username = ".$_Name."\nYour Login Password = ".$password;
        $headers = 'From:nemodorylab2018@gmail.com';
      
       
          if (mail($to,$subject,$message,$headers)){
              echo "<h2 style='color:blue;'>Email Sent</h2>";
             
          }
          else{
            echo "<h2 style='color:red;'>";
              echo "Sending Failed! Check Your Internet Connection";
            echo "</h2>";
          }       
 
}



?>
    <form action="addsucceed.php" method="post" enctype="multipart/form-data">
        Email Address<br>
        <input type="text" name="email" value="<?php echo $_UserEmail;?>"/><br>
        <input type="submit" name="submit" value="Send Email"/><br>
        <input type="submit" name="AddAnother" value="Add Another User" formaction="admin.php"/><br>
    </form>
  