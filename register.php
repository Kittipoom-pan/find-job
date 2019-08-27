<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <meta http-equiv=Content-Type content="text/html; charset=utf-8">
  <script>
      $(document).ready(function(){
          $.get("http://192.168.64.2/Register/config.php", function(data, status){
              console.log(data);
              var toEmployee = JSON.parse(data);
              for(var i = 0; i < toEmployee.length; i++){
                var id = "id: " + toEmployee[i].ID +
                        "firstname" + toEmployee[i].Firstname +
                        "" + toEmployee[i].Lastname +
                        "" + toEmployee[i].Gender +
                        "" + toEmployee[i].Age +
                        "" + toEmployee[i].Email +
                        "" + toEmployee[i].Password +
                        "" + toEmployee[i].Confirmpassword;
              }
          });
          $("#submit").click(function(){
              var FirstName = $("#firstname").val();
              var LastName = $("#lastname").val();
              var GenDer = $("#gender").val();
              var AgE = $("#age").val();
              var EmaiL = $("#email").val();
              var PassWord = $("#password").val();
              var ConfirmPassWord = $("#confirmpassword").val();

              var id = {
                Firstname : FirstName,
                Lastname : LastName,
                Gender : GenDer,
                Age : AgE,
                Email : EmaiL,
                Password : PassWord,
                ConfirmPassword : ConfirmPassWord
              };

              $.post("http://192.168.64.2/Register/config.php", id, function(data){
                  console.log(data);
              });
          });
      });
  </script>
  <title>Register</title>
</head>
<body>
      <?php
          //  $res = file_get_contents('http://192.168.64.2/Register/config.php');
          //  $obj = json_decode($res);
          //  echo $obj[0] -> {'ID'};
          //  $tt = $res->result_array();
          //  echo $tt[0];
      ?>

<div class="container">
<div id="frmRegistration">
<div class="col-md-8 ml-auto mt-3">
<form class="form-horizontal" action="save_register.php" method="POST">
	<h1>สมัครสมาชิก</h1>
	<div class="form-group">
    <label class="control-label col-sm-2" for="firstname">ชื่อจริง *</label>
    <div class="col-sm-6 ax-auto">
      <input type="text" name="firstname" class="form-control" id="firstname" placeholder="กรุณากรอกชื่อจริง" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="lastname">นามสกุล *</label>
    <div class="col-sm-6">
      <input type="text" name="lastname" class="form-control" id="lastname" placeholder="กรุณากรอกนามสกุล" required> 
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="gender">เพศ *</label>
    <div class="col-sm-6">
      <label class="radio-inline"><input type="radio" name="gender" value="Male">ผู้ชาย</label>
	  <label class="radio-inline"><input type="radio" name="gender" value="Female">ผู้หญิง</label>
    </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="age">อายุ *</label>
    <div class="col-sm-6">
    <input type="text" name="age" class="form-control" id="age" placeholder="กรุณาใส่อายุ" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">อีเมล</label>
    <div class="col-sm-6">
      <input type="email" name="email" class="form-control" id="email" placeholder="กรุณากรอกอีเมล">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="password">พาสเวิร์ด</label>
    <div class="col-sm-6"> 
      <input type="password" name="password" class="form-control" id="password" placeholder="กรุณากรอกพาสเวิร์ดอีเมล">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="confirmpassword">ยืนยันพาสเวิร์ด</label>
    <div class="col-sm-6"> 
      <input type="password" name="confirmpassword" class="form-control" id="confirmpassword" placeholder="กรุณายืนยันพาสเวิร์ด">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary" id="submit">ยืนยัน</button>
    </div>
  </div>
</form>
</div>
</div>
</div>
</div>
</body>
</html>

<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>