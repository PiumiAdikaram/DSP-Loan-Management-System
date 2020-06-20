<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dspdb";
	
	// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Function for Delete Button
	
	// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!empty($_POST['view'])){
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

require 'fpdf/fpdf.php';
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',15);


	$pdf->Cell(50,10,"Full Name",1,0);
	$pdf->Cell(50,10,$fullName,1,1);

	$pdf->Cell(50,10,"Name With Initials",1,0);
	$pdf->Cell(50,10,$nameWithInitials,1,1);

	$pdf->Cell(50,10,"NIC",1,0);
	$pdf->Cell(50,10,$nic,1,1);
	
	$pdf->Cell(50,10,"DOB",1,0);
    $pdf->Cell(50,10,$dob,1,1);

    $pdf->Cell(50,10,"Email",1,0);
    $pdf->Cell(50,10,$email,1,1);

    $pdf->Cell(50,10,"Phone Number",1,0);
    $pdf->Cell(50,10,$pnumber,1,1);

    $pdf->Cell(50,10,"Address",1,0);
 	$pdf->Cell(50,10,$address,1,1);

    $pdf->Cell(50,10,"City",1,0);
    $pdf->Cell(50,10,$city,1,1);

    $pdf->Cell(50,10,"employee Name",1,0);
    $pdf->Cell(50,10,$empName,1,1);

    $pdf->Cell(50,10,"Designation",1,0);
    $pdf->Cell(50,10,$desig,1,1);

    $pdf->Cell(50,10,"Basic Salary",1,0);
    $pdf->Cell(50,10,$bSalary,1,1);

    $pdf->Cell(50,10,"Income",1,0);
    $pdf->Cell(50,10,$income,1,1);

    $pdf->Cell(50,10,"Guatantee Relationship",1,0);
    $pdf->Cell(50,10,$grelationship,1,1);

    $pdf->Cell(50,10,"Guarentee Name",1,0);
    $pdf->Cell(50,10,$gname,1,1);

 	$pdf->Cell(50,10,"Guarentee NIC",1,0);
    $pdf->Cell(50,10,$gnic,1,1);

    $pdf->Cell(50,10,"Guarentee Ocupation",1,0);
    $pdf->Cell(50,10,$goccupation,1,1);

    $pdf->Cell(50,10,"Guarentee Phone No:",1,0);
    $pdf->Cell(50,10,$gmobile,1,1);

     $pdf->Cell(50,10,"Loan Amount",1,0);
    $pdf->Cell(50,10,$lamount,1,1);

     $pdf->Cell(50,10,"Payment Method",1,0);
    $pdf->Cell(50,10,$pmethod,1,1);

    $pdf->Cell(50,10,"Payment Period",1,0);
    $pdf->Cell(50,10,$pperiod,1,1);

    $pdf->Cell(50,10,"Loan Purpose",1,0);
    $pdf->Cell(50,10,$lpurpose,1,1);

    $pdf->Output();
 }
$con->close();	
?>

