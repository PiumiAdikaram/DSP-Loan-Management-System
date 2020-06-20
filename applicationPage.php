
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
    $gender=$_POST["gender"];

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
      $query = "INSERT INTO customer (fullName,nameWithInitials,nic,dateOfBirth,email,permanentAddress,mobileNo,city,gender) VALUES ('$fullName','$nameWithInitials','$nic','$dob','$email','$addres','$phoneNumber','$city','$gender')";

    if (mysqli_query($conn, $query)) {
       $last_id = $conn->insert_id;
       echo "New record created successfully";
       //echo ;
       
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
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/application.css">
</head>
<body>




<img src="images/h5.jpeg" alt="Italian Trulli" width="100%" height="400px">

 <div class="form">
    <form id="regForm" action="applicationPage.php" method="POST">
      <h1>Personal Loans</h1>
      <!-- One "tab" for each step in the form: -->
      <div class="tab">
        <h2>Personal Details</h2>
        <select>
          <option value="mr">Mr.</option>
          <option value="mrs">Mrs.</option>
          <option value="ms">Ms.</option>
          <option value="rev">Rev.</option>
        </select><br><br>
        Name in Full:
        <input oninput="this.className = ''" name="fname"><br><br>
        Name with Initials:
        <input oninput="this.className = ''" name="name"><br><br>
        NIC:
        <input oninput="this.className = ''" name="nic"><br><br>
        Date of Birth:
        <input oninput="this.className = ''" name="dob"><br><br>
        Gender: <br><br>      
            Male  <input type="radio" checked="checked" name="gender">
            Female<input type="radio" name="gender">
     
        Email Address:
        <input  oninput="this.className = ''" name="email"><br><br>
        Contact No:
       <input placeholder="personal" oninput="this.className = ''" name="pnumber"><br><br>
       
        Address:
        <input  oninput="this.className = ''" name="address"><br><br>
        Marital Status: <br><br>      
            Married:<input type="radio" checked="checked" name="civilstatus">
            Unmarried: <input type="radio" name="civilstatus">
            
     
      </div>

      <div class="tab">
        <h2>Emplyment Details:</h2><br> 
        Name of Employer:
        <p><input  oninput="this.className = ''" name="empName"></p>
        Designation:
        <p><input  oninput="this.className = ''" name="desig"></p>
        <br>
        <h2>Salary Details:</h2><br>  
        Basic Salary:
        <p><input  oninput="this.className = ''" name="bSalary"></p>
        Allowances:
        <p><input  oninput="this.className = ''" name="allowances"></p>
        Other incomes:
        <p><input  oninput="this.className = ''" name="income"></p>
        Deductions:
        <p><input  oninput="this.className = ''" name="deduc"></p>
        Net Salary:
        <p><input  oninput="this.className = ''" name="netSalary"></p>
      </div>

      <div class="tab">
        <h2>Guarantee Details</h2><br>
        Relationship:
        <p><input  oninput="this.className = ''" name="grelationship"></p>
        Name with Initials:
        <p><input  oninput="this.className = ''" name="gname"></p>
        NIC:
        <p><input  oninput="this.className = ''" name="gnic"></p>
        Occupation:
        <p><input  oninput="this.className = ''" name="goccupation"></p>
        Mobile Number:
        <p><input  oninput="this.className = ''" name="gmobile"></p>
      </div>

      <div class="tab">
        <h2>Loan Details</h2>
        Loan Amount:
        <p><input  oninput="this.className = ''" name="lamount"></p>
        Payment Method:
        <p><input  oninput="this.className = ''" name="pmethod"></p>
        Payment Period:
        <p><input  oninput="this.className = ''" name="pperiod"></p>
        Loan Purpose:
        <p><input  oninput="this.className = ''" name="lpurpose"></p>
      </div>

      <div style="overflow:auto;">
        <div style="float:right;">
          <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
          <!--<button type="submit" id="nextBtn" name="add" onclick="nextPrev(1)" >Next</button>-->
          <input type="submit" id="nextBtn" name="add" onsubmit="return nextPrev(1)" >Next
        </div>
      </div>
      <!-- Circles which indicates the steps of the form: -->
      <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
      </div>
    </form>
  </div>
  
  <article>
      <div id="cal">
          <h3>Calculator</h3>
           <form>
              Loan Amount:<br>
              <input type="text" name="loanAmount"><br>
              Payment Method: <br>
              <select id="paymentMethod" onchange="durationChange(this);">
                <option value="weekly">Weekly</option>
                <option value="monthly">Monthly</option>
              </select>
              <br/>
              Loan Duration: <br>
              <select id="duration">
                <option value="0">Loan Duration</option>
              </select>
              <br>Payment:<br>
              <input type="text" name="payment"><br>

</form> 
      </div>
      <div id="details">
          <h3>Details</h3>
          <table border="1" width="100%">
            <tr>
              <th>Payment Method</th>
              <th>Interest Rate</th>
            </tr>
            <tr>
              <td>Weekly</td>
              <td>1.5%</td>
            </tr>
            <tr>
              <td>Monthly</td>
              <td>2.5%</td>
            </tr>
          </table>
          <p>
            In finance, a loan is the lending of money by one or more individuals, organizations, or other entities to other individuals, organizations etc. The recipient (i.e. the borrower) incurs a debt, and is usually liable to pay interest on that debt until it is repaid, and also to repay the principal amount borrowed
          </p>
      </div>




  </article>
</section>

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

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}







//Javascript codes for calculator
var durationLists = new Array(2)  
 durationLists["weekly"] = ["3 months", "6 months", "9 months"]; 
 durationLists["monthly"] = ["6 months", "12 months", "18 months", "24 months"]; 
 
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
