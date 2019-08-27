<?php 
    include_once('navbar-emy.php');

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $conn->real_escape_string($_POST['psw']);

        $sql = "SELECT * FROM `employer` WHERE `Email` = '".$email."' AND `Password`='".$password."'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION['id'] = $row['job_id'];
            $_SESSION['Email'] = $row['Fullname'];
            header("location:home-emy.php");
        }else{
            echo 'username and password is invalid';
        }
    }
?>