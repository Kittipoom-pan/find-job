<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="loginemy.css">
    <script src="loginemy.js"></script>
    <title>Document</title>
    <script type="text/javascript">
        function fncSubmit(check){
            if(document.getElementById('fullname').value==""){
                alert("กรุณาป้อนชื่อจริง");
                document.getElementById('fullname').focus();
                return false;
            }
            // เช็คค่าว่าง ถ้าไม่ได้ป้อนจะปริ้น และ focus ไปที่ช่องที่ไม่ได้ใส่่่ค่า
            if(document.getElementById('email').value==""){
                alert("กรุณาป้อนอีเมล");
                document.getElementById('email').focus();
                return false;
            }
            //check login ตรวจการใ่ส่ email
            var emailFilter=/^.+@.+\..{2,3}$/;
			var check=document.form1.email.value;
			if (!(emailFilter.test(check))) {
				alert("ใส่อีเมล์ไม่ถูกต้อง");
				document.getElementById("email").value=="";
				document.getElementById("email").focus();
				return false;
			}
             // เช็คค่าว่าง ถ้าไม่ได้ป้อนจะปริ้น และ focus ไปที่ช่องที่ไม่ได้ใส่่่ค่า
             if(document.getElementById('password').value==""){
                alert("กรุณาป้อนรหัสผ่าน");
                document.getElementById('password').focus();
                return false;
            }
            //check password ห้ามน้อยกว่า 8 ตัว
            pass1=document.getElementById("password").value;
			if(pass1.length<8){
				alert('กรุณาป้อนรหัสมากกว่า8');
				return false;
			}
            if(pass1.length>20){
				alert('กรุณาป้อนรหัสไม่เกิน20');
				return false;
			}
            // เช็คค่าว่าง ถ้าไม่ได้ป้อนจะปริ้น และ focus ไปที่ช่องที่ไม่ได้ใส่่่ค่า
            if(document.getElementById('repassword').value==""){
                alert("กรุณาป้อนยืนยันรหัสผ่าน");
                document.getElementById('repassword').focus();
                return false;
            }

            // เช็ค password
            var pass1 = document.getElementById("password").value;
            pass2 = document.getElementById("repassword").value;
            if(pass1!=pass2){
                alert("พาสเวิร์ดไม่ตรงกัน กรุณาป้อนใหม่");
                document.getElementById("password").value;
                document.getElementById("password").focus;
                document.getElementById("repassword").value;
                document.getElementById("repassword").focus;
                return false;
            }
            document.form1.submit();
            alert('Register completed');
            // return true;
        }
    </script>
</head>
<?php 
    include_once('config.php');
    // include_once('checklogin-emy.php');

    // if(isset($_POST['submit'])){
    //     $email = $_POST['email'];
    //     $password = $conn->real_escape_string($_POST['psw']);

    //     $sql = "SELECT * FROM `employer` WHERE `Email` = '".$email."' AND `Password`='".$password."'";
    //     $result = $conn->query($sql);

    //     if($result->num_rows > 0){
    //         $row = $result->fetch_assoc();
    //         $_SESSION['id'] = $row['job_id'];
    //         $_SESSION['Email'] = $row['Fullname'];
    //         header("location:home-emy.php");
    //     }else{
    //         echo 'username and password is invalid';
    //     }
    // }
?>
<body>
    <div id="box">
        <div id="main">
        <form  action="checklogin-emy.php" method="post">
            <div id="loginform">
                <h1>Login</h1>
                <input type="email" name="email" placeholder="Email"/><br>
                <input type="password" name="psw" placeholder="Password"/><br>
                <button type="submit" name="submit">LOGIN</button>
            </div>
        </form>
        <form name="form1" action="save_regisemy.php" method="post" onSubmit="JavaScript:return fncSubmit();">
            <div id="signupform">
                <h1>Sign Up</h1>
                <input type="text" name="fullname" id="fullname" placeholder="Fullname"/><br>
                <input type="text" name="tel" id="tel"  placeholder="Telephone"/><br>
                <input type="email" name="email" id="email" placeholder="Email" /><br>
                <input type="password" name="psw" id="password" placeholder="Password"/><br>
                <input type="password" name="repsw" id="repassword" placeholder="Re-password" /><br>
                <a href='add-job.php?id=<?=$_SESSION['id']?>'><button>สมัครงาน</button></a>
            </div>
        </form>
            <!-- <div id="login_msg">Have an account</div>
            <div id="signup_msg">Don't have an account?</div> -->

            <button id="login_btn">Login</button>
            <button id="signup_btn">Sign Up</button>
        </div>
    </div>
</body>
</html>