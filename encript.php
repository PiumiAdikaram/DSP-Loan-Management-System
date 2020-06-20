<?php
require_once("connection.php");
        $pass="123";
        $password=md5($pass);
		$sql="UPDATE login
            SET password = '$password'
            WHERE userName='123'";
		$result=mysqli_query($conn,$sql);

?>