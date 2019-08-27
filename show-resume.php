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

<!-- Modal contact -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title pull-left">Edit contact</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Address</label>
          <input type="text" id="address" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Phone number</label>
          <input type="text" id="phone" class="form-control">
        </div>
          <input type="hidden" id="userId" class="form-control">

      </div>
      <div class="modal-footer">
        <a href="#" id="save" class="btn btn-primary pull-right">Update</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal profile -->
<div id="myModals" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title pull-left">Edit profile</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="Position">Firstname</label>
          <input type="text" id="fname" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Lastname</label>
          <input type="text" id="lname" class="form-control">
        </div>
        <div class="form-group">
          <label for="gender">Gender</label>
          <input type="radio" name="gender" id="gender" class="form-control" value="male">
          <label class="light">Male</label>
          <input type="radio" name="gender" id="gender" class="form-control" value="female">
          <label class="light">Female</label>
        </div>
        <div class="form-group">
          <label for="">Age</label>
          <input type="int" id="age" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Salary</label>
          <input type="int" id="salary" class="form-control">
        </div>
          <input type="hidden" id="userId" class="form-control">

      </div>
      <div class="modal-footer">
        <a href="#" id="save" class="btn btn-primary pull-right">Update</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
  <p>Find me on social media.</p>
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w`3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
<?php }?>
</body>

<script>
$(function() {    
  // contact form
    $(document).on('click','a[data-role=update]',function(){
      var id = $(this).data('id');
      //var skill = $('#'+id).children('li[data-skill=skill]').text();
      var address = $('#'+id).children('p[data-target=address]').text();
      var email = $('#'+id).children('p[data-target=email]').text();
      var phone = $('#'+id).children('p[data-target=phone]').text();

      $('#address').val(address);
      $('#email').val(email);
      $('#phone').val(phone);
      $('#userId').val(id);
      $('#myModal').modal('toggle');
    });

    $('#save').click(function(){
      var id = $('#userId').val();
      var address = $('#address').val();
      var email = $('#email').val();
      var phone = $('#phone').val();

			$.ajax({
        url : 'edit-resume.php',
        method : 'post',
        data : {address : address , email : email , phone : phone , id : id},
        success : function(response){
          //now update user record in table
          $('#'+id).children('p[data-target=address]').text(address);
          $('#'+id).children('p[data-target=email]').text(email);
          $('#'+id).children('p[data-target=phone]').text(phone);
          $('#myModal').modal('toggle');
        }
      });
    });
  });
</script>

<script>
$(function() {    
  // profile form
    $(document).on('click','a[data-roles=update]',function(){
      var id = $(this).data('id');
      var fname = $('#'+id).children('h5[data-target=fname]').text();
      var lname = $('#'+id).children('h5[data-target=lname]').text();
      var gender = $('#'+id).children('h5[data-target=gender]').text();

      $('#fname').val(fname);
      $('#lname').val(lname);
      $('#gender').val(gender);
      $('#userId').val(id);
      $('#myModals').modal('toggle');
    });

    $('#save').click(function(){
      var id = $('#userId').val();
      var address = $('#address').val();
      var email = $('#email').val();
      var phone = $('#phone').val();

          $.ajax({
          url : 'edit-resu.php',
          method : 'post',
          data : {id : uid},
          dataType : "json",
          success : function(response){
            //now update user record in table
            $('#fname').val(data.fname);
            $('#lname').val(data.lname);
            $('#gender').val(data.gender);
            $('#age').val(data.age);
            $('#line').val(data.line);
            $('#myModals').modal('toggle');
        }
      });
    });
  });
</script>

<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>

</html>
