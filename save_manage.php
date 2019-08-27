<?php
    $serverName = "localhost";
    $userName = "root";
    $userPassword = "";
    $dbName = "Employee";

$objConn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

$strSQL = "SELECT * FROM manageprofile WHERE firstname = '".trim($_POST['firstname'])."' ";
$objQuery = mysqli_query($objConn,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

if($objResult)
{
        echo "Username already exists!";
}
else
{	
    
$strSQL = "INSERT INTO manageprofile (Firstname, Lastname, Gender, Age, Email, Line, Phone, Address, Typejob, 
Workingdays, Howmanyrates) 
VALUES ( '".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['gender']."', '".$_POST['age']."', '".$_POST['email']."'
,'".$_POST['line']."', '".$_POST['phone']."', '".$_POST['address']."', '".$_POST['typejob']."', '".$_POST['howmanyrates']."',
'".$_POST['numberofworkingdays']."')";
$objQuery = mysqli_query($objConn,$strSQL);
// var_dump($objQuery); exit();
echo "Register Completed!<br>";		
echo "<br> Go to <a href='home.php'>Home page</a>";  
}


mysqli_close($objConn);
?>