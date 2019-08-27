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
.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
    width: 90%;
    margin-top: 15px;
    margin-bottom: 30px;
    height: 50px;
    border-radius: 6px;
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
.mb-2, .my-2 {
    margin-bottom: .5rem!important;
    width: 20%;
}
input[type="text"], input[type="email"], textarea, select {
    width:90%;
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
    // if(isset($_POST['update'])){
    // // echo 'name :'.$_FILES['fileupload']['name'].'<br>'; 
    //     $ID = $_GET['ID'];

    //     $fnames = $_POST['Firstname'];
    //     $lnames = $_POST['Lastname'];
    //     $genders = $_POST['Gender'];
    //     $ages = $_POST['Age'];
    //     $emails = $_POST['Email'];
    //     $phones = $_POST['Phone'];
    //     $addresss = $_POST['Address'];
    //     $salarys = $_POST['Salary'];
    //     $provinces = $_POST['Province'];
    //     $dists = $_POST['District'];


    //     // $temp = explode('.',$_FILES['fileupload']['name']);
    //     // $newName = round(microtime(true)).'.'. end($temp);

    //     // if(move_uploaded_file($_FILES['fileupload']['tmp_name'],'uploads/'.$newName)){
    //         $sql = "UPDATE manageprofile SET Firstname = '".$fnames."', Lastname = '".$lnames."', Age = '".$ages."', Gender = '".$genders."', Email = '".$emails."', Province = '".$provinces."', 
    //                 District = '".$dists."', Phone = '".$phones."', Address = '".$addresss."', Salary = '".$lnames."' WHERE ID='".$ID."'";
    //         $result = $conn->query($sql);
    //         $id = mysqli_insert_id($conn);

    //         for($i = 0; $i < count($_POST['category']); $i++){
    //             $title = $_POST['titlejob'][$i];
    //             $category = $_POST['category'][$i];
    //             $des = $_POST['description'][$i];
    //             $start = $_POST['date_start'][$i];
    //             $datestop = $_POST['date_stop'][$i];

    //             $sql = "REPLACE INTO experience VALUES('', '$id', '$title','$category','$des','$start','$datestop')";
    //             mysqli_query($conn, $sql);
    //         }
   
    //         foreach($_POST['special'] as $quals) {
    //             if(empty($quals)) {
    //                 continue;
    //             }
    //             $sql = "REPLACE special VALUES('', '$id', '$quals')";
    //             $r2 = mysqli_query($conn, $sql);
    //         }
    //         foreach($_POST['skill'] as $qual) {
    //             if(empty($qual)) {
    //                 continue;
    //             }
    //             $sql = "REPLACE INTO skill VALUES('', '$id', '$qual')";
    //             $r2 = mysqli_query($conn, $sql);
    //         }
    //         foreach($_POST['categoryJob'] as $cate) {
    //             if(empty($cate)) {
    //                 continue;
    //             }
    //             $sql = "REPLACE jobCategory VALUES('', '$id', '$cate')";
    //             $r2 = mysqli_query($conn, $sql);
    //         }
    //         foreach($_POST['disease'] as $dis) {
    //             if(empty($dis)) {
    //                 continue;
    //             }
    //             $sql = "REPLACE disease VALUES('', '$id', '$dis')";
    //             $r2 = mysqli_query($conn, $sql);
    //         }
     
    //         mysqli_close($conn);
    //         $_SESSION['ID'] = $result['ID']; 
    //          //เก็บข้อมูลลง session เพื่อให้เปิดอ่าน resume ได้ 1 ครั้ง
    //         if($result){ ?>
                 <!-- <script language="JavaScript">alert("ข้อมูลถูกจัดเก็บเรียบร้อยแล้ว \r\n\r\n");</script> -->
                 <!-- <script language="JavaScript">window.location.href = "show-resume.php";</script> -->
             <?//}
    //         }else{
    //             echo '<script> alert("ข้อมูลของท่านไม่ถูกจัดเก็บ กรุณากรอกข้อมูลใหม่")</script>';
    //         }
    //         // var_dump($objQuery); exit();
    //     }
    
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

    $ID = $profile['ID'];
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
    <form action="update-profile.php?ID=<?php echo $ID?>" method=post class="w3-content w3-margin-top" style="max-width:1400px;">
    <div class="w3-row-padding">
    
        <!-- Left Column -->
        <div class="w3-third">
        
        <div class="w3-white w3-text-grey w3-card-4">
            <div class="w3-display-container">
            <br>
            <!-- <label for="fileupload">อัพโหลดรูปภาพ :</label>
            <input type="file" id="fileupload" name="fileupload" onchange="readURL(this)">

            <figure class="figure">
                <img id="imgUpload" class="figure-img img-fluid rounded" alt="">
                <figcaption class="figure-caption"></figcaption>
            </figure><br> -->
            <div class="w3-display-bottomleft w3-container w3-text-black">
            </div>
            </div>
            <div class="w3-container" id="<?php echo $profile['ID'];?>">
            <!-- update jquery -->
            <!-- <div class="col col-4" data-label="Payment Status"><a href="edit.php?GetID=<?php echo $ID?>">Edit</a></div> -->
            <h6>ที่อยู่ :<input type="text" class="form-control mb-2" placeholder="Job" name="Address" value="<?php echo $address;?>"></h6>
            <h6>อีเมล :<input type="text" class="form-control mb-2" placeholder="Job" name="Email" value="<?php echo $email;?>"></h6>
            <h6>เบอร์โทรศัพท์ :<input type="text" class="form-control mb-2" placeholder="Job" name="Phone" value="<?php echo $phone;?>"></h6>
            <hr>

            <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>ทักษะ</b></p>
            <?php 
                                $jid = $profile['ID'];
                                $sql = "SELECT * FROM skill WHERE id = $jid";
                                $r2 = mysqli_query($conn, $sql);
                                while($qual = mysqli_fetch_array($r2)) {
                                    if(!empty($qual['skill_text'])) {?>
                                <input type="text" class="form-control mb-2" placeholder="Job" name="skill[]" value="<?php echo $qual['skill_text'];?>">

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
                    <input type="text" class="form-control mb-2" placeholder="Job" name="categoryJob[0]" value="<?php echo $qual['category'];?>">
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
            <div class="w3-contain" id="<?php echo $profile['ID'];?>">
            <h6> ชื่อจริง :  <input type="text" class="form-control mb-2" placeholder="Job" name="Firstname" value="<?php echo $fname?>"></h6>
            <h6> นามสกุล : <input type="text" class="form-control mb-2" placeholder="Job" name="Lastname" value="<?php echo $lname?>"></h6>
            <h6> เพศ :<input type="text" class="form-control mb-2" placeholder="Job" name="Gender" value="<?php echo $gender?>"></h6>
            <h6> อายุ :<input type="text" class="form-control mb-2" placeholder="Job" name="Age" value="<?php echo $age?>"></h6>
            <h6> เขต :<input type="text" class="form-control mb-2" placeholder="Job" name="District" value="<?php echo $dist?>"></h6>
            <h6> จังหวัด :<input type="text" class="form-control mb-2" placeholder="Job" name="Province" value="<?php echo $province?>"></h6>
            <h6> เงินเดือน :<input type="text" class="form-control mb-2" placeholder="Job" name="Salary" value="<?php echo $salary?>"></h6>
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
                    <h5>ชื่องาน :</h5>
                    <input type="text" class="form-control mb-2" placeholder="Job" name="titlejob[0]" value="<?php echo $qual['title_job'];?>">
                    <h5>ประเภทงาน :</h5>
                    <input type="text" class="form-control mb-2" placeholder="Job" name="category[0]" value="<?php echo $qual['category'];?>">
                    <h5>รายละเอียดงาน :</h5>
                    <input type="text" class="form-control mb-2" placeholder="Job" name="description[0]" value="<?php echo $qual['description'];?>">
                    <h5>วันที่เริ่มงาน :</h5>
                    <input type="date" class="form-control mb-2" placeholder="Job" name="date_start[0]" value="<?php echo $qual['date_start'];?>">                    
                    <h5>วันที่สิ้นสุดการทำงาน :</h5>
                    <input type="date" class="form-control mb-2" placeholder="Job" name="date_stop[0]" value="<?php echo $qual['date_stop'];?>">                 
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
                    <input type="text" class="form-control mb-2" placeholder="Job" name="disease[]" value="<?php echo $qual['disease_text'];?>">
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
                    <input type="text" class="form-control mb-2" placeholder="Job" name="special[]" value="<?php echo $qual['condition_text'];?>">
                <?php
                    }
                }
                ?>        
                <button class="btn btn-primary" name="update">Update</button>

            </div>
            <!-- <button class="btn btn-primary" name="update">Update</button> -->

        </div>

        <!-- End Right Column -->
        </div>

    <!-- End Grid -->
    </div>

    </form>
    <!-- End Page Container -->
    </div>
            <?php } ?>
    
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
