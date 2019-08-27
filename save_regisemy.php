<?php
    include_once ("config.php");
    $strSQL = "INSERT INTO employer(Fullname,Tel,Email,Password) VALUES('".$_POST['fullname']."', '".$_POST['tel']."','".$_POST["email"]."', '".$_POST["psw"]."')";
    $objQuery = mysqli_query($conn,$strSQL);
    header("location:loginemy.php");
    //var_dump($objQuery); exit(); //ตรวจสอบข้อผิดพลาด
    mysqli_close($conn);
?>