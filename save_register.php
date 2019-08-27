<?php
   include_once("config.php");
	
if(trim($_POST["firstname"]) == "")
{
    echo "Please input firstname!";
    exit();	
}

if(trim($_POST["lastname"]) == "")
{
    echo "Please input password!";
    exit();	
}

if(trim($_POST["gender"]) == "")
{   
    echo "Please input gender!";
    exit();	
}

if(trim($_POST["age"]) == "")
{
    echo "Please input Password!";
    exit();	
}

if(trim($_POST["email"]) == "")
{
    echo "Please input Password!";
    exit();	
}
    
 if($_POST["password"] != $_POST["confirmpassword"])
 {
     echo "Password not Match!";
     exit();
 }

if(trim($_POST["password"]) == "")
{
    echo "Please input Name!";
    exit();	
}	

$strSQL = "SELECT * FROM employee WHERE firstname = '".trim($_POST['firstname'])."' ";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
if($objResult)
{
        echo "Username already exists!";
}
else
{	
    
$strSQL = "INSERT INTO employee (Firstname,Lastname,Gender,Age,Email,Password) VALUES 
( '".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['gender']."', '".$_POST['age']."', '".$_POST['email']."'
,'".$_POST['password']."')";
$objQuery = mysqli_query($conn,$strSQL);
    
echo "Register Completed!<br>";		

header("location:home.php");
    
}

mysqli_close($conn);
?>