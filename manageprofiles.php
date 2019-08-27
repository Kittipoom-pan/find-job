<?php //include "check-user.php"; ?>
<html>
<link rel = "stylesheet" type = "text/css" href = "manage.css">
<link href="https://fonts.googleapis.com/css?family=Nunito:400,300" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <meta http-equiv=Content-Type content="text/html; charset=utf-8">
<head>
    <title>Manage Profile</title>
    <?php include_once('includes/navbar.php'); ?>
</head>
<style> 
body {
  font-family: "Nunito", sans-serif;
  color: #384047;
  background-color: #778899;
}
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
.w3-margin-top {
    margin-top: 50px!important;
}
.w3-contain{
  display:grid;
  grid-template-columns: repeat(2,1fr);
  margin: 14px;
}
.w3-container{
  margin-top: 10px!important;
}
.w3-opacity, .w3-hover-opacity:hover {
  opacity: 0.60;
  margin-top: 14px;
}
.profile {
  font-family: "Roboto", sans-serif;
  margin-top: 150px;
  text-align: center;
}
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #778899;
  border: none;
  color: #ffffff;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 430px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: "\00bb";
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
.buttons {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  width: 180px;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius:4px;
  
}
img {
    vertical-align: middle;
    border-style: none;
    margin-left: 25%;
}

.button4 {background-color: #e7e7e7; color: black;} /* Gray */ 
.button5 {background-color: #555555;} /* Black */
</style>
<body>
    <?php 
    include_once('config.php');
    if(isset($_SESSION['ID'])){   
        $id = $_SESSION['ID'];
    }   
    if(isset($_POST['submit'])){
        // echo 'name :'.$_FILES['fileupload']['name'].'<br>'; 

        $temp = explode('.',$_FILES['fileupload']['name']);
        $newName = round(microtime(true)).'.'. end($temp);

        if(move_uploaded_file($_FILES['fileupload']['tmp_name'],'uploads/'.$newName)){
            $sql = "INSERT INTO `manageprofile` (`ID`, `Picture`, `Firstname`, `Lastname`, `Age`, `Gender`, `Email`, `Province`,`District`, `Phone`, `Address`, `Salary`) 
            VALUES (NULL,'".$newName."','".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['age']."', '".$_POST['gender']."', '".$_POST['email']."', '".$_POST['province']."','".$_POST['district']."','".$_POST['phone']."','".$_POST['address']."','".$_POST['salary']."')";
            $result = $conn->query($sql);
            $id = mysqli_insert_id($conn);

            for($i = 0; $i < count($_POST['category']); $i++){
                $title = $_POST['titlejob'][$i];
                $category = $_POST['category'][$i];
                $des = $_POST['description'][$i];
                $start = $_POST['date_start'][$i];
                $datestop = $_POST['date_stop'][$i];

                $sql = "REPLACE INTO experience VALUES('', '$id', '$title','$category','$des','$start','$datestop')";
                mysqli_query($conn, $sql);
            }
   
            foreach($_POST['special'] as $quals) {
                if(empty($quals)) {
                    continue;
                }
                $sql = "REPLACE special VALUES('', '$id', '$quals')";
                $r2 = mysqli_query($conn, $sql);
            }
            foreach($_POST['skill'] as $qual) {
                if(empty($qual)) {
                    continue;
                }
                $sql = "REPLACE INTO skill VALUES('', '$id', '$qual')";
                $r2 = mysqli_query($conn, $sql);
            }
            // for($i = 0; $i < count($_POST['categoryJob']); $i++){
            //     $categoryJob = $_POST['categoryJob'][$i];

            //     $sql = "REPLACE INTO jobCategory VALUES('', '$id','$categoryJob')";
            //     mysqli_query($conn, $sql);
            // }
            foreach($_POST['categoryJob'] as $cate) {
                if(empty($cate)) {
                    continue;
                }
                $sql = "REPLACE jobCategory VALUES('', '$id', '$cate')";
                $r2 = mysqli_query($conn, $sql);
            }
            foreach($_POST['disease'] as $dis) {
                if(empty($dis)) {
                    continue;
                }
                $sql = "REPLACE disease VALUES('', '$id', '$dis')";
                $r2 = mysqli_query($conn, $sql);
            }
     
            mysqli_close($conn);
            $_SESSION['ID'] = $result['ID']; 
             //เก็บข้อมูลลง session เพื่อให้เปิดอ่าน resume ได้ 1 ครั้ง
            if($result){ ?>
                <script language="JavaScript">alert("ข้อมูลถูกจัดเก็บเรียบร้อยแล้ว \r\n\r\n");</script>
                <!-- <script language="JavaScript">window.location.href = "show-resume.php";</script> -->
            <?}
            }else{
                echo '<script> alert("ข้อมูลของท่านไม่ถูกจัดเก็บ กรุณากรอกข้อมูลใหม่")</script>';
            }
            // var_dump($objQuery); exit();
        }
    
    ?>
    <?php $sql = "SELECT * FROM manageprofile WHERE ID = $id";
    $result = mysqli_query($conn, $sql);
    $profile = mysqli_fetch_array($result);?>
    <?php 
    if(isset($profile['ID'])){
    ?>
    <?php 
    //include_once('includes/navbar.php'); 
    include_once('config.php'); 

    // if(isset($_SESSION['ID'])){   
    //   $id = $_SESSION['ID'];
      //var_dump($id);

    $sql = "SELECT * FROM manageprofile WHERE ID = $id";
    $result = mysqli_query($conn, $sql);
    $profile = mysqli_fetch_array($result);

    $fname = $profile['Firstname'];
    $lname = $profile['Lastname'];
    $gender = $profile['Gender'];
    $age = $profile['Age'];
    $email = $profile['Email'];
    $phone = $profile['Phone'];
    $address = $profile['Address'];
    $salary = $profile['Salary'];
    $province = $profile['Province'];
    $dist = $profile['District'];

    ?>
    <h1 class="profile">ประวัติส่วนตัว</h1>

    <body class="w3-light-grey">
    <!-- Page Container -->
    <div class="w3-content w3-margin-top" style="max-width:1400px;">

    <!-- The Grid -->
    <div class="w3-row-padding">
    
        <!-- Left Column -->
        <div class="w3-third">
        
        <div class="w3-white w3-text-grey w3-card-4">
            <div class="w3-display-container">
            <?php 
            echo "<img src='uploads/".$profile['Picture']."'; width=50%;>";
            ?>
            <div class="w3-display-bottomleft w3-container w3-text-black">
            </div>
            </div>
            <div class="w3-container" id="<?php echo $profile['ID'];?>">
            <!-- update jquery -->
            <!-- <div class="col col-4" data-label="Payment Status"><a href="edit.php?GetID=<?php echo $ID?>">Edit</a></div> -->
            <a href="edit-profile.php" data-role="update" data-id="<?php echo $profile['ID'];?>"><i class="fa fa-edit fa-fw w3-right w3-large w3-text-teal"></i></a>
            <p data-target="address"><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $address;?></p>
            <p data-target="email"><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $email;?></p>
            <p data-target="phone"><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $phone ;?></p>
            <hr>

            <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>ทักษะ</b></p>
            <?php 
                                $jid = $profile['ID'];
                                $sql = "SELECT * FROM skill WHERE id = $jid";
                                $r2 = mysqli_query($conn, $sql);
                                while($qual = mysqli_fetch_array($r2)) {
                                    if(!empty($qual['skill_text'])) {?>
                    <li data-skill="skill"><?php echo $qual['skill_text'];?></li>
                <?php
                                    }
                                }
                            ?>
            <br>
            <hr>

            <p class="w3-large"><b><i class="fa fa-blind fa-fw w3-margin-right w3-text-teal"></i>งานที่สนใจ</b></p>
            <?php 
                            $sql = "SELECT * FROM jobCategory WHERE id = $jid";
                                $r2 = mysqli_query($conn, $sql);
                                while($qual = mysqli_fetch_array($r2)) {
                                    if(!empty($qual['category'])) {?>
                    <li data-skill="skill"><?php echo $qual['category'];?></li>
                <?php
                                    }
                                }
                            ?>
            <br>
            <br>
            </div>
        </div><br>

        <!-- End Left Column -->
        </div>

        <!-- Right Column -->
        <div class="w3-twothird">
        
        <div class="w3-container w3-card w3-white w3-margin-bottom">
            <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-user fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>ประวัติส่วนตัว</h2>
            <a href="edit-profile.php" data-roles="update" id="<?php echo $profile['ID'];?>"><i class="fa fa-edit fa-fw w3-right w3-large w3-text-teal"></i></a>
            <div class="w3-contain" id="<?php echo $profile['ID'];?>">
            <h5 class="w3-opacity" data-target="fname"><b>ชื่อจริง :  </b><?php echo $fname;?></h5>
            <h5 class="w3-opacity" data-target="lname"><b>นามสกุล : </b> <?php echo $lname;?></h5>
            <h5 class="w3-opacity" data-target="gender"><b>เพศ :  </b><?php echo $gender;?></h5>
            <h5 class="w3-opacity" data-target="age"><b>อายุ : </b> <?php echo $age;?></h5>
            <h5 class="w3-opacity" data-target="phone"><b>เบอโทรศัพท์ :  </b><?php echo $phone;?> </h5>
            <h5 class="w3-opacity" data-target="email"><b>อีเมล :  </b><?php echo $email;?> </h5>
            <h5 class="w3-opacity" data-target="address"><b>ที่อยู่ :  </b><?php echo $address;?> </h5>
            <h5 class="w3-opacity" data-target="address"><b>เขต :  </b><?php echo $dist;?> </h5>
            <h5 class="w3-opacity" data-target="address"><b>จังหวัด :  </b><?php echo $province;?> </h5>
            <h5 class="w3-opacity" data-target="address"><b>เงินเดือน :  </b><?php echo $salary;?> </h5>

            </div>
        </div>
        
        <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>ประสบการณ์ทำงาน</h2>
        <div class="w3-container">
        <?php 
                                $jid = $profile['ID'];
                                $sql = "SELECT * FROM experience WHERE id = $jid";
                                $r2 = mysqli_query($conn, $sql);
                                while($qual = mysqli_fetch_array($r2)) {
                                    if(!empty($qual['title_job'])) {?>
                    <h5 class="w3-opacity"><b><?php echo $qual['title_job'];?> / <?php echo $qual['category'];?></b></h5>
                    <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $qual['date_start'];?> - <?php echo $qual['date_stop'];?></h6>
                    <p><?php echo $qual['description'];?></p>
                    <hr>
                <?php
                                    }
                                }
                    ?>
        </div>
        </div>

        <div class="w3-container w3-card w3-white">
            <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>หมายเหตุ</h2>
            <div class="w3-container">
            <h5>โรคประจำตัว :</h5>
                <?php 
                    $jid = $profile['ID'];
                    $sql = "SELECT * FROM disease WHERE id = $jid";
                    $r2 = mysqli_query($conn, $sql);
                    while($qual = mysqli_fetch_array($r2)) {
                        if(!empty($qual['disease_text'])) {?>
                    <li data-skill="skill"><?php echo $qual['disease_text'];?></li>
                <?php
                    }
                }
                ?>        
            </div>
            <div class="w3-container">
            <h5>เงื่อนไขพิเศษ :</h5>
                <?php 
                    $jid = $profile['ID'];
                    $sql = "SELECT * FROM special WHERE id = $jid";
                    $r2 = mysqli_query($conn, $sql);
                    while($qual = mysqli_fetch_array($r2)) {
                        if(!empty($qual['condition_text'])) {?>
                    <li data-skill="skill"><?php echo $qual['condition_text'];?></li>
                <?php
                    }
                }
                ?>   
                <br>
                     
            </div>
        </div>
        <!-- End Right Column -->
        </div>
    <!-- End Grid -->
    </div>
    <!-- End Page Container -->
    </div>

    <?php }else{ ?>
        <h1 class="profile">ประวัติส่วนตัว</h1>
        <form action="" method="POST" enctype="multipart/form-data">
    
            <fieldset>
            <legend><span class="section">1</span>ประวัติส่วนตัว</legend>
            <br>
            <label for="fileupload">อัพโหลดรูปภาพ :</label>
            <input type="file" id="fileupload" name="fileupload" onchange="readURL(this)">

            <figure class="figure">
                <img id="imgUpload" class="figure-img img-fluid rounded" alt="">
                <figcaption class="figure-caption"></figcaption>
            </figure><br>
            <br>     
            <label class="" for="firstname">ชื่อจริง : *</label>
            <input type="text" name="firstname" id="firstname" placeholder="กรุณาใส่ชื่อจริง" required>

            <label class="" for="lastname">นามสกุล : *</label>
            <input type="text" name="lastname" id="lastname" placeholder="กรุณาใส่นามสกุล" required>

            <label class="" for="age">อายุ : *</label>
            <input type="text" name="age" id="age" placeholder="กรุณาใส่ระบุอายุ" required>

            <label for="gender">เพศ :</label>
            <input type="radio" name="gender" value="ชาย">
            <label class="light">ชาย</label>
            <input type="radio" name="gender" value="หญิง">
            <label class="light">หญิง</label><br>
            <br>

            <label for="email">อีเมล :</label>
            <input type="email" name="email" id="email" placeholder="กรุณากรอกอีเมลแอดเดรส">

            <label for="phone">เบอร์โทรศัพท์ : *</label>
            <input type="text" name="phone" id="phone" placeholder="กรุณาใส่เบอร์โทรศัพท์" required>

            <label for="address">ที่อยู่ : *</label>
            <input type="text" name="address" id="address" placeholder="5/323 หมู่บ้าน,ถนน,รหัสไปรษณีย์" required>

            <label for="province">จังหวัด : *</label>
            <input type="text" name="province" id="province" placeholder="กรุณาใส่จังหวัด" required>

            <label for="district">เขต : *</label>
            <input type="text" name="district" id="district" placeholder="กรุณาใส่เขต" required>

            </fieldset>

            <fieldset>
            <legend><span class="section">2</span>งาน</legend> 
            <br>
            <label for="">ประเภทงานที่สนใจ :</label><br>
            <input type="checkbox" name="categoryJob[0]" value="แม่บ้าน">
            <label class="light">แม่บ้าน</label><br>
            <input type="checkbox" name="categoryJob[1]" value="คนสวน">
            <label class="light">คนสวน</label><br>
            <input type="checkbox" name="categoryJob[2]" value="คนดูแลเด็ก">
            <label class="light">คนดูแลเด็ก</label><br><br>

            <label class="" for="skill">ทักษะ : *</label>
            <input type="text" name="skill[]" id="skill" value="" placeholder="กรุณาใส่ทักษะเกี่ยวกับงานที่ทำ" required>
            <button type="button" class="buttons button4" id="add">เพิ่มทักษะ</button>
            <button type="button" class="buttons button5" id="delete">ลดทักษะ</button><br><br>

            <label class="" for="salary">เงินเดือน :</label>
            <input type="text" name="salary" id="salary" placeholder="กรุณาระบุเงินเดือนที่ต้องการ">
            </fieldset>

            <fieldset>
            <legend><span class="section">3</span>ประสบการณ์ทำงาน</legend> 
            <br>
            <label for="titlejob">ชื่องาน :</label>
            <input type="text" name="titlejob[0]" id="titlejob" placeholder="คนดูแลความสะอาด">

            <label for="category">ตำแหน่งงาน :</label>
            <input type="text" name="category[0]" id="category" placeholder="คนขับรถ">

            <label>วันที่เริ่มทำงาน :</label>
            <input type="date" name="date_start[0]" id="date_start"><br><br> วันที่สิ้นสุดการทำงาน : <input type="date" name="date_stop[0]" id="date_stop">
            <br><br>
            <label for="description">ลักษณะงานที่ทำ : </label>
            <input type="text" name="description[0]" id="description" placeholder="เลี้ยงดูเด็ก , ตัดต้นไม้">
            <hr>

            <label for="titlejob">ชื่องาน :</label>
            <input type="text" name="titlejob[1]" id="titlejob" placeholder="คนดูแลความสะอาด">

            <label for="category">ตำแหน่งงาน : </label>
            <input type="text" name="category[1]" id="category" placeholder="คนขับรถ">

            <label>วันที่เริ่มทำงาน :</label>
            <input type="date" name="date_start[1]" id="date_start"><br><br> วันที่สิ้นสุดการทำงาน : <input type="date" name="date_stop[1]" id="date_stop"><br>
            <br>
            <label for="description">ลักษณะงานที่ทำ : </label>
            <input type="text" name="description[1]" id="description" placeholder="เลี้ยงดูเด็ก , ตัดต้นไม้">
            <hr>

            <label for="titlejob">ชื่องาน :</label>
            <input type="text" name="titlejob[2]" id="titlejob" placeholder="คนดูแลความสะอาด">

            <label for="category">ตำแหน่งงาน : </label>
            <input type="text" name="category[2]" id="category" placeholder="คนขับรถ">

            <label>วันที่เริ่มทำงาน :</label>
            <input type="date" name="date_start[2]" id="date_start"> <br><br> วันที่สิ้นสุดการทำงาน : <input type="date" name="date_stop[2]" id="date_stop">
            <br><br>

            <label for="description">ลักษณะงานที่ทำ : </label>
            <input type="text" name="description[2]" id="description" placeholder="เลี้ยงดูเด็ก , ตัดต้นไม้"> 
            </fieldset>

            <fieldset> 
            <legend><span class="section">4</span>หมายเหตุ</legend> 
            <br>
            <label for="disease">โรคประจำตัว :</label>
            <input type="text" name="disease[]" id="disease" placeholder="กรุณาใส่โรคประจำตัว(ถ้ามี)">
            <button type="button" class="buttons button4" id="addd">เพิ่มโรคประจำตัว</button>
            <button type="button" class="buttons button5" id="deleted">ลดโรคประจำตัว</button><br><br>

            <label for="special">เงื่อนไขพิเศษ :</label>
            <input type="text" name="special[]" id="special" placeholder="กรุณาใส่เงื่อนไขพิเศษ เช่น ตาบอดสี, พิการ(ถ้ามี)">
            <button type="button" class="buttons button4" id="add_c">เพิ่มคุณสมบัติ</button>
            <button type="button" class="buttons button5" id="delete_c">ลดคุณสมบัติ</button><br><br>
                     
            </fieldset>
            <br>
            <!-- <button type="submit" name="submit">ยืนยัน</button> -->
            <button type="submit" name="submit" class="button" style="vertical-align:middle"><span>ยืนยัน </span></button>
        </form>
    <?php } ?>
<?php //} ?>
    
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script>
        function readURL(input){
            var reader = new FileReader();

            reader.onload = function(e){
                console.log(e.target.result)
                $('#imgUpload').attr('src', e.target.result).width(250)
            }
            reader.readAsDataURL(input.files[0]);
        }
        </script>
        <script>
        $(function() {
            $('#addd').click(function() {
                var content = '<input type="text" name="disease[]" id="disease" placeholder="กรุณาใส่โรคประจำตัว(ถ้ามี)">';

                if($('input[name="disease[]"]').length < 10) {
                    $('input[name="disease[]"]:last').after(content);
                }
            });
                $('#addd').click(); 
            
            $('#deleted').click(function() {
                if($('input[name="disease[]"]').length > 1) {
                    $('input[name="disease[]"]:last').remove();
                }
            });
        });
        </script>

         <script>
        $(function() {
            $('#add').click(function() {
                var content = '<input type="text" name="skill[]" id="skill" value="" placeholder="กรุณาใส่ทักษะเกี่ยวกับงานที่ทำ">';
                if($('input[name="skill[]"]').length < 10) {
                    $('input[name="skill[]"]:last').after(content);
                }
            });
                $('#add').click();  
            
            $('#delete').click(function() {
                if($('input[name="skill[]"]').length > 1) {
                    $('input[name="skill[]"]:last').remove();
                }
            });
        });
        </script>

        <script>
        $(function() {
            $('#add_c').click(function() {
                var content = '<input type="text" name="special[]" id="special" placeholder="กรุณาใส่เงื่อนไขพิเศษ เช่น ตาบอดสี, พิการ(ถ้ามี)">';
                if($('input[name="special[]"]').length < 10) {
                    $('input[name="special[]"]:last').after(content);
                }
            });
                $('#add_c').click();    
            
            $('#delete_c').click(function() {
                if($('input[name="special[]"]').length > 1) {
                    $('input[name="special[]"]:last').remove();
                }
            });
        });
        </script>
    </body>
</html>
