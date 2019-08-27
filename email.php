<?php
	include('config.php');
	include('checklogin.php');

	if(!isset($_SESSION['ID'])) {
		echo '<script> alert("กรุณาล๊อคอินเข้าสู่ระบบก่อน")</script>';
		echo ("<script>location.href='home.php'</script>");
}
?>
<?php require($_SERVER['DOCUMENT_ROOT']."/find job/lib/phpmailer/PHPMailerAutoload.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<style>
body {
	font-family: montserrat, arial, verdana;
    background-color: #2863a2;
}
/*form styles*/
.container {
	width: 50%;
	margin: 50px auto;
	margin-top: 100px;
	position: relative;
	background: white;
	border: 0 none;
	border-radius: 3px;
	box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
	padding: 20px 30px;
	box-sizing: border-box;
	width: 80%;	
	/*stacking fieldsets above each other*/
}
</style>

<body>
    <div class="container">
        <h3>สมัครงาน</h3>
        <a href="https://myaccount.google.com/lesssecureapps?pli=1"><p>กรุณาคลิ๊กที่นี่เพื่อคลิกเปิดอนุญาติความปลอดภัยในการส่งเมล *</p></a>
        <form action="" method="post">
		<?php 
			include "config.php";

			$id =$_SESSION['ID'];
				
			$sql = "SELECT * FROM manageprofile WHERE ID = '$id'";
			$result = mysqli_query($conn, $sql);
			$job = mysqli_fetch_array($result);
		?>
                <input type="hidden" class="form-control" name="name" value="<?=$job['Firstname']?>">
            <div class="form-group">
                <label for="exampleInputEmail1">อีเมล *</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="กรอกอีเมลที่ใช้ในการติดต่อ">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">รหัสผ่าน *</label>
                <input type="password" class="form-control" name="password" placeholder="กรอกรหัสผ่านอีเมล">
            </div>
                <input type="hidden" class="form-control" name="subject" value="สนใจสมัครงาน">
            <button type="submit" class="btn btn-primary">ยืนยัน</button>
        </form>
    </div>
</body>
</html>
<?php
    if($_POST){
		header('Content-Type: text/html; charset=utf-8');

		$mail = new PHPMailer;
		$mail->CharSet = "utf-8";
		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
		$mail->SMTPAuth = true;

		$from = $_POST['email'];
        $pass = $_POST['password'];
        $name = $_POST['name'];
		$subject = $_POST['subject'];

		$gmail_username = "$from"; // gmail ที่ใช้ส่ง
		$gmail_password = "$pass"; // รหัสผ่าน gmail
		// ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1

		$sender = "$name"; // ชื่อผู้ส่ง
        $email_sender = "$from"; // เมล์ผู้ส่ง 
        $subject = "$subject"; // หัวข้อเมล์
        
        if(isset($_GET['id'])) { $id = $_GET['id']; }
        else if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
        }
        $sql = "SELECT Email FROM employer WHERE job_id = $id";
        $result = $conn->query($sql) or die($conn->error);
        $row=$result->fetch_assoc();

        $to = $row['Email'];
		$email_receiver = "$to"; // เมล์ผู้รับ ***

		$mail->Username = $gmail_username;
		$mail->Password = $gmail_password;
		$mail->setFrom($email_sender, $sender);
		$mail->addAddress($email_receiver);
		$mail->Subject = $subject;

		$id =$_SESSION['ID'];
		
		$sql = "SELECT ID FROM manageprofile WHERE ID = '$id'";
		//echo $id;
        $result = $conn->query($sql) or die($conn->error);
		$row=$result->fetch_assoc();

		$_SESSION['id'] = $row['ID'];

		$email_content = "
			<!DOCTYPE html>
			<html>
				<head>
					<meta charset=utf-8'/>
					<title>ทดสอบการส่ง Email</title>
				</head>
				<body>
				<div style='background:#fff;'>
					<h1 style='background: #669933;padding: 10px 0 20px 10px;margin-bottom:10px;font-size:30px;color:white;'>
						<center>Eldery job</center>
					</h1>
					<div style='padding:20px;'>
						<div>				
							<h2 style='color:#000;'>พิจารณาผู้สมัครงานได้จากลิ้งได้ล่าง</h2>
							<a href='http://192.168.64.2/find job/home-emy.php?id={$_SESSION['id']}' target='_blank'>
                                <h3><strong style='color:#3c83f9;'> >>Resume<< </strong> </h3>
                            </a>
						</div
						<div style='margin-top:30px;'>
							<hr>
							<address>
								<p style='color:#000;'>เลือกลูกจ้างที่ตรงใจคุณ</p>
								<p style='color:#000;'>Eldery job</p>
							</address>
						</div>
					</div>
					<div style='background: #3b434c;color: #a2abb7;padding:30px;'>
						<div style='text-align:center'> 
							2019 © Eldery job
						</div>
					</div>
				</div>	
				</body>
			</html>
		";
	}

	error_reporting(0); //ปิด error

	//  ถ้ามี email ผู้รับ
    if($email_receiver){
        $mail->msgHTML($email_content);

        if (!$mail->send()) {  
            echo '<script> alert("ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง")</script>';  
            //echo $mail->ErrorInfo; // ข้อความ รายละเอียดการ error
        }else{
            echo '<script> alert("ส่งอีเมลเรียบร้อยแล้ว")</script>';
        }	
    }
?>

<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
