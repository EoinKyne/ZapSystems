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
	<p style="float:left; font-size:40px;">Zap Systems</p>
</header>
<br><br><br>


<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$con = mysql_connect("localhost","root"); //connecting to database
if (!$con)
  {
  die('Could not connect: ' . mysql_error()); //if connection is unsuccessful it give a message 'could not connect'
  }

mysql_select_db("zapsystems", $con); //tells which database that you want to work with

$sql="INSERT INTO customers (Registration_Date, Customer_Name, Customer_Address1, Customer_Address2, Customer_Address3, PostCode, Contact, Email, Telephone_No, Product, Sales_Rep )
VALUES
('$_POST[Registration_Date]','$_POST[Customer_Name]','$_POST[Customer_Address1]','$_POST[Customer_Address2]','$_POST[Customer_Address3]','$_POST[PostCode]','$_POST[Contact]','$_POST[Email]','$_POST[Telephone_No]','$_POST[Product]','$_POST[Sales_Rep]')";

if (!mysql_query($sql,$con)) //this executes all the code above for the sql statement
  {
  die('Error: ' . mysql_error());
  }
echo "Thank you for entering information needed, New Customer added.";

mysql_close($con); //closing connection to database
?>


<br><br><br>
<a name="link" href="customerpage.html" title="Customers" style="font-size:20px; display:inline;"> Back to Add Customer Page</a>
<br><br>

<footer style="float:bottom">

	<address>Zap Systems, 1 One Street, Galway, Ireland.</address>
	<p>© Copyright 2015</p>
	<br><br>

</footer>

</body>

</html>