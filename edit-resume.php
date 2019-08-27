<?php 
include_once('config.php');

if(isset($_POST['email'])){
    $job = $_POST['job'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $id = $_POST['id'];

    $result = mysqli_query($conn , "UPDATE manageprofile SET Jobcategory='$job' ,
    Address='$address' ,  Email='$email' , Phone='$phone' WHERE ID='$id'");
    if($result){
        echo 'data updated';
    }else{
        echo 'Not success';
    }
}