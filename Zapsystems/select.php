<!DOCTYPE html>
<html lang = "en">

<head>
	<meta http-equiv = "content-type" content ="text/html, charset = utf-8"/>
	
	<title>Customer Requests Report</title>
	
	<style> 
		body{margin:25px 100px 0px 100px; background-color:lightblue;}
		header{background-color:white}
		footer{background-color:white; float:bottom}
	</style>
	
</head>
<body>
<header>
	<img src="images/Logo.png" width="180px" height="120px" float="center"> 	
	<p style="font-size:40px; float:left">Zap Systems</p>
</header>
<br><br>


<?php
error_reporting(E_ALL^E_DEPRECATED);
$con = mysql_connect("localhost","root"); //connecting to the database
if (!$con)
  {
  die('Could not connect: ' . mysql_error()); //if connection is unsuccessful it give a message 'could not connect'
  }

mysql_select_db("zapsystems", $con); //tells which database that you want to work with

$result = mysql_query("SELECT * FROM customer_request JOIN customers ON customer_request.Registration_No = customers.Registration_No"); //getting information from emp table

echo "<table border='1'>  
<tr> 
<th>Request_No</th>
<th>Customer_Name</th>
<th>Registration No</th>
<th>Request Details</th>
<th>Request Submitted Date</th>
<th>Request Submitted Time</th>
<th>Outcome Action</th>
<th>Request Outcome Date</th>
<th>Request Outcome Time</th>
</tr>";

while($row = mysql_fetch_array($result)) //this creates a loop 
  {
  echo "<tr>";
  echo "<td>" . $row['Request_No'] . "</td>";
  echo "<td>" . $row['Customer_Name'] . "</td>";
  echo "<td>" . $row['Registration_No'] . "</td>";
	  echo "<td>" . $row['Request_Details'] . "</td>";
   echo "<td>" . $row['Request_Date'] . "</td>";
   echo "<td>" . $row['Request_Time'] . "</td>";
  echo "<td>" . $row['Outcome_Action'] . "</td>";
    echo "<td>" . $row['Outcome_Date'] . "</td>";
   echo "<td>" . $row['Outcome_Time'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con); //closing connection
?> 
<br><br>
<a name="link" href="customerrequestpage.html" title="Customer Requests" style="font-size:20px; display:inline;"> Back to Customer Requests</a>
<br><br><br>

<footer>

	<address>Zap Systems, 1 One Street, Galway, Ireland.</address>
	<p>© Copyright 2015</p>
	<br><br>
	
</footer>

</body>

</html>