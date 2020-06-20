<?php

    require_once("connection.php");

    //total users
    $sql = "SELECT* FROM login";
    $result = $conn->query($sql);
  
    $TotalUsers=$result->num_rows;
    
    //echo $TotalUsers;
   
//officers
    $sql = "SELECT* FROM login WHERE userCategory='Officer'";
    $result = $conn->query($sql);
    
    $Officers=$result->num_rows;
    
    //echo $Officers;
//customers
    $sql = "SELECT* FROM login WHERE userCategory='Customer'";
    $result = $conn->query($sql);
    
    $Customers=$result->num_rows;
    
    //echo $Customers;
//cc  
    $sql = "SELECT* FROM login WHERE userCategory='Cash Collector'";
    $result = $conn->query($sql);
    
    $CC=$result->num_rows;
    
    //echo $CC;

//Activated...
    $sql = "SELECT* FROM login WHERE Activated='Y'";
    $result = $conn->query($sql);
    
    $Active=$result->num_rows;
    //echo $Active;
    $ActivePer=$Active/$TotalUsers;
    $ActPercentage=round($ActivePer*100);
    //echo $ActivePer*100;
    //echo $ActPercentage;

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	<style type="text/css">
		
		.userTitle{
			font-size: 15px;
			text-align: center;
		}
		.usercount{
			font-size: 25px;
			text-align: center;
			margin-bottom: -5px;
			color: #00004d;
		}
		.col-md-3{
			
			background-color: #e6eeff;
			padding-top:  10px;
			margin-bottom: 10px;
			

		}
		.progress,.pbar{
			width: 25%;
			margin-left: 5%;
		}
		.usercountbar{

		}

	</style>

</head>
<body>




<div class="container h-100">
<div class="usercountbar">
	<div class="col-md-3">
		<p class="usercount"><?php echo $TotalUsers; ?></p>
		<p class="userTitle">Total Users</p>
		
	</div>

	<div class="col-md-3">
		<p class="usercount"><?php echo $Customers; ?></p>
		<p class="userTitle">Total Customers</p>
		
	</div>

	<div class="col-md-3">
		<p class="usercount"><?php echo $Officers; ?></p>
		<p class="userTitle">Total Officers</p>
		
	</div>

	<div class="col-md-3">
		<p class="usercount"><?php echo $CC; ?></p>
		<p class="userTitle">Total Cash Collectors</p>
		
	</div>
</div>

<p class="pbar"><i class="glyphicon glyphicon-ok-sign"></i> Active Users : <?php echo $ActPercentage."%"; ?></p>
 <div class="progress">
  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $ActPercentage;?>"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $ActPercentage;?>%">
    <?php echo $ActPercentage."%";?>
  </div>
</div>

</div>
</body>
</html>






