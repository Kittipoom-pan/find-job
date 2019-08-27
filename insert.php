<?php
include_once('config.php');
$chat=mysqli_real_escape_string($conn,$_POST['msg']);
$names=mysqli_real_escape_string($conn,$_POST['name']);
// $id=mysqli_real_escape_string($conn,$_POST['id']);
// var_dump($id);
$query="INSERT INTO chat(msg,name) VALUES ('$chat','$names')";
$run=mysqli_query($conn,$query);
if($run){
    }else{
        die ("query fails".mysqli_error($conn));
    }
    ?>
