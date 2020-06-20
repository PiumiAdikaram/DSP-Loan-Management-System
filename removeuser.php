<?php

if(isset($_POST["submit"])){ 
       
        function removecustomer($conn,$userId){
            $sql = "DELETE FROM customer WHERE customerId=$userId";
            
            if ($conn->query($sql) === TRUE) {
                header("location:customerlist.php");
                //echo "Record deleted successfully";
            } else {
                //echo "Error deleting record: " . $conn->error;
            }
        }

        function removeofficer($conn,$userId){
            $sql = "DELETE FROM officer WHERE officerId=$userId";
            
            if ($conn->query($sql) === TRUE) {
                header("location:officerlist.php");
                //echo "Record deleted successfully";
            } else {
                //echo "Error deleting record: " . $conn->error;
            }
        }

        function removecc($conn,$userId){
            $sql = "DELETE FROM cashcollector WHERE CC_Id=$userId";
            
            if ($conn->query($sql) === TRUE) {
                header("location:cashcollectorlist.php");
                //echo "Record deleted successfully";
            } else {
                //echo "Error deleting record: " . $conn->error;
            }
        }

        function removelogin($conn,$userName){
            
            $sql = "DELETE FROM login WHERE userName=$userName";
            
            if ($conn->query($sql) === TRUE) {
                header("location:officerlist.php");
                //echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }

        //session_start();
       // $userName=$_SESSION['username'];
        //$userName=$_POST['$userName'];
        $userId=$_POST['userId'];
        $userCategory=$_POST['userCategory'];
        require_once("connection.php");
        //removelogin($conn,$userName);

        if($userCategory=="Customer"){
            //removelogin($conn,$userName);
            removecustomer($conn,$userId);
        }

        if($userCategory=="Officer"){
            //removelogin($conn,$userName);
            removeofficer($conn,$userId);
            
        }

        if($userCategory=="CC"){
            //removelogin($conn,$userName);
            removecc($conn,$userId);
        }

    }

?>