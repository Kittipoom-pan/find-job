<!DOCTYPE html>
<html>
<title>resume</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<style> 
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
.w3-margin-top {
    margin-top: 70px!important;
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
</style>
<?php 
    //include_once('includes/navbar.php'); 
    include_once('config.php'); 

    if(isset($_SESSION['ID'])){   
      $id = $_SESSION['ID'];
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
<?php
    if(isset($profile['ID'])){
 ?>     

<body class="w3-light-grey">
<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="img/carpenter.jpg" style="width:100%" alt="Avatar">
          <div class="w3-display-bottomleft w3-container w3-text-black">
          </div>
        </div>
        <div class="w3-container" id="<?php echo $profile['ID'];?>">
          <!-- update jquery -->
          <a href="#" data-role="update" data-id="<?php echo $profile['ID'];?>"><i class="fa fa-edit fa-fw w3-right w3-large w3-text-teal"></i></a>
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
   						$sql = "SELECT * FROM category WHERE id = $jid";
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
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-user fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Profile</h2>
        <a href="#" data-roles="update" id="<?php echo $profile['ID'];?>"><i class="fa fa-edit fa-fw w3-right w3-large w3-text-teal"></i></a>
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
        </div>
      </div>
    <!-- End Right Column -->
    </div>
  <!-- End Grid -->
  </div>
  <!-- End Page Container -->
</div>
<?php }?>

<?php }else {?>
  <div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>4<span>0</span>4</h1>
			</div>
			<p>ไม่มีผู้สนใจสมัครงาน กรุณากลับไปหน้าแรก</p>
			<a href="home-emy.php">home page</a>
		</div>
	</div>
<?php } ?>
</body>
<style>
* {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

body {
  padding: 0;
  margin: 0;
}

#notfound {
  position: relative;
  height: 100vh;
  background-color: #222;
}

#notfound .notfound {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.notfound {
  max-width: 460px;
  width: 100%;
  text-align: center;
  line-height: 1.4;
}

.notfound .notfound-404 {
  height: 158px;
  line-height: 153px;
}

.notfound .notfound-404 h1 {
  font-family: 'Josefin Sans', sans-serif;
  color: #222;
  font-size: 220px;
  letter-spacing: 10px;
  margin: 0px;
  font-weight: 700;
  text-shadow: 2px 2px 0px #c9c9c9, -2px -2px 0px #c9c9c9;
}

.notfound .notfound-404 h1>span {
  text-shadow: 2px 2px 0px #ffab00, -2px -2px 0px #ffab00, 0px 0px 8px #ff8700;
}

.notfound p {
  font-family: 'Josefin Sans', sans-serif;
  color: #c9c9c9;
  font-size: 16px;
  font-weight: 400;
  margin-top: 90px;
  margin-bottom: 15px;
}

.notfound a {
  font-family: 'Josefin Sans', sans-serif;
  font-size: 14px;
  text-decoration: none;
  text-transform: uppercase;
  background: transparent;
  color: #c9c9c9;
  border: 2px solid #c9c9c9;
  display: inline-block;
  padding: 10px 25px;
  font-weight: 700;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}

.notfound a:hover {
  color: #ffab00;
  border-color: #ffab00;
}

@media only screen and (max-width: 480px) {
  .notfound .notfound-404 {
    height: 122px;
    line-height: 122px;
  }

  .notfound .notfound-404 h1 {
      font-size: 122px;
  }
}

</style>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>

</html>
