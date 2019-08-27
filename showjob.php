<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="showjob.css">
	<title>Showjob</title>
	<?php include_once('includes/navbar.php'); ?>
</head>
<body onload="myFunction()">
<!-- <iframe id="niw" src="" width="74" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe> -->
</body>
</html>
<style>

.company {
    background: #194E83;
}
.contact button {
    width: 100%;
    padding: 1em;
    background: #194E83;
    border: 0;
    text-transform: uppercase;
    /* border: 1px solid #669933; */
	color: white;
	margin-top: 10px;
}
.contact button:hover,
.contact button:focus {
  background: #113050;
  color: white;
  outline: 0;
  transition: background-color 2s ease-out;
}
#niw {
	margin-top: 20px;
}
.container{
	margin-top: 160px;
}

</style>
<?php 
		//$id = 0; ตรวจสอบ id ที่ส่งมา
	   if(isset($_GET['id'])) { 
		   $id = $_GET['id']; 
		   $userid=$_SESSION['ID'];
		
		   //นับจำนวนคนเข้าดูงาน
		   $view="SELECT * FROM employee WHERE ID=$userid";
		   $rs = mysqli_query($conn,$view);
		   $num=mysqli_num_rows($rs);
		   if($rs)
		   {
				$qu="UPDATE job SET job_view=job_view+1 WHERE id = $id";
				$rs = mysqli_query($conn,$qu);
		   }
		}
	   else if(isset($_SESSION['id'])){
		   $id = $_SESSION['id'];
	   }
	   include('config.php');
	   $sql = "SELECT * FROM job WHERE id = $id";
	   $result = mysqli_query($conn, $sql);
	   $job = mysqli_fetch_array($result);

	   $name = $job['name'];
	   $position = $job['typejob'];
	   $place = $job['place'];
	   $province = $job['province'];
	   $amphur = $job['amphur'];
	   $district = $job['district'];
	   $postcode = $job['postcode'];
	   $quantity = $job['quantity'];
	   $salary = $job['salary'];
	   $workday = $job['workday'];
	   $date = $job['post_date'];
?>		

<div class="container" onload="myFunction()">
	<div class="wrapper animated fadeInDown">
		<div class="company">
			<h3><?php echo $name;?></h3>
			<hr style color="white">
			<h4><?php echo $position;?></h4>
			<ul>
				<li><b>สถานที่ปฏิบัติงาน : </b><?php echo $place;?></li>
			</ul>
		</div>
		<div class="contact">
	   			<p>
				   <h5>รายละเอียดงาน : </h5>		
					<label>
						<?php 
							$jid = $job['id'];
							$sql = "SELECT * FROM description WHERE id = $jid";
							$r2 = mysqli_query($conn, $sql);
							while($qual = mysqli_fetch_array($r2)) {
								if(!empty($qual['des_text'])) {
									echo "<li>{$qual['des_text']}</li>";
								}
							}
						?>
					</label>
				</p>
				<p>
	   				<h5>คุณสมบัติ :</h5>
					<label>
						<?php 
							$jid = $job['id'];
							$sql = "SELECT * FROM qualification WHERE id = $jid";
							$r2 = mysqli_query($conn, $sql);
							while($qual = mysqli_fetch_array($r2)) {
								if(!empty($qual['qual_text'])) {
									echo "<li>{$qual['qual_text']}</li>";
								}
							}
						?>
					</label>
				</p>
				<p>
	   				<h5>สวัสดิการ :</h5>
					<label>
						<?php 
							$jid = $job['id'];
							$sql = "SELECT * FROM benefit WHERE id = $jid";
							$r2 = mysqli_query($conn, $sql);
							while($qual = mysqli_fetch_array($r2)) {
								if(!empty($qual['benefit_text'])) {
									echo "<li>{$qual['benefit_text']}</li>";
								}
							}
						?>
					</label>
				</p>
				<p>
					<h5>จำนวนกี่อัตรา : <?php echo $quantity;?> คน </h5>		
				</p>
				<p>
					<h5>เงินเดือน : <?php echo $salary;?> บาท</h5>		
				</p>
				<p>
					<h5>จำนวนวัน : <?php echo $workday;?></h5>		
				</p>
				<div>
			   		<iframe id="niw" src="" width="100%" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
				</div>
				<p>
					<a href='email.php?id=<?=$job['job_id']?>'><button>สมัครงาน</button></a>
			    </p>
		</div>
   </div>
</div>

<script>
	function myFunction(){
		var x = document.URL;
		document.getElementById("niw").src = 'https://www.facebook.com/plugins/share_button.php?href='+x+'&layout=button_count&size=large&width=74&height=28&appId" width="74" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>';
	}
</script>
	   
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>


