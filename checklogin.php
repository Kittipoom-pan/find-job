<?php
    if(isset($_POST['submit'])){
        $username = $_POST['email'];
        $password = $conn->real_escape_string($_POST['password']);

        $sql = "SELECT * FROM `employee` WHERE `Email` = '".$username."' AND `Password`='".$password."'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION['ID'] = $row['ID'];
            $_SESSION['Email'] = $row['Firstname'];
            echo '<script> alert("เข้าสู่ระบบสำเร็จ")</script>';  
            echo ("<script>location.href='job.php'</script>");
        }else{
            echo '<script> alert("อีเมลหรือพาสเวิร์ดไม่ถูกต้อง")</script>';  
        }
    }
    ?>