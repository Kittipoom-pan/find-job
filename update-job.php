<?php
require_once("config.php");

if(isset($_POST['update']))
{
    $ID = $_GET['ID'];
    $Name = $_POST['job'];
    $Jobcategory = $_POST['jobcategory'];
    $place = $_POST['place'];
    $province = $_POST['province'];
    $amphur = $_POST['amphur'];
    $district = $_POST['district'];
    $postcode = $_POST['postcode'];
    $quantity = $_POST['quantity'];
    $salary = $_POST['salary'];
    $workday = $_POST['workday'];

    $query = "update job set name = '".$Name."', typejob='".$Jobcategory."', place='".$place."', province='".$province."',
              amphur='".$amphur."', district='".$district."', postcode='".$postcode."', quantity='".$quantity."', salary='".$salary."', workday='".$workday."' where id='".$ID."'";
    $result = mysqli_query($conn, $query);

    if($result){
        header("location:Job_post.php");
    }else{
        echo 'Please check your query';
    }
}else{
    header("location:index.php");
}