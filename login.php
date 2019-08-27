<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel = "stylesheet" type = "text/css" href = "login.css" >
  <title>Login</title>
</head> 
<body>
<?php 
    include_once('includes/navbar.php');
    include_once('config.php');
    include_once('checklogin.php');

?>
  <div class="box">
    <h2>เข้าสู่ระบบ</h2>      
    <form name="form1" action="" method="POST" onSubmit="JavaScript fncSubmit();">
      <div class="inputBox">
        <input type="text" name="email" id="email" required="">
        <label for="">อีเมล</label>
      </div>
      <div class="inputBox">
        <input type="password" name="password" id="password" required="">
        <label for="">พาสเวิร์ด</label>
      </div>
      <a href=""><input type="submit" name="submit" value="ยืนยัน"></a>
    </form>
  </div>
</body>

<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>

  


