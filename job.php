<?php
	include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel = "stylesheet" type = "text/css" href = "job.css">
	<!-- <link rel = "stylesheet" type = "text/css" href = "button.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>	
	<title>Job</title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<?php include_once('includes/navbar.php'); ?>
</head>
<body>
<?php 
	// 	if(isset($_POST['search'])){
	// 		$id = $_POST['id']; 
	// 		$quan = $_POST['idd']; 

	// 		var_dump($quan);

	// 	$sql = "UPDATE job SET save_job=$quan";
	//     if($sql){
	// 		echo '<script> alert("เข้าสู่ระบบสำเร็จ")</script>';  
	// 		echo '<script> alert($quan)</script>';  

	// 	}else{
    //         echo '<script> alert("เข้าสู่ระบบสำdwdwdเร็จ")</script>';  
	// 	}
	// }		
?>
<style>
.contain .link_table {
    color: #1E8449;
}
.contain .record{
	margin-top: -65px;
	margin-left: -27px;
}
.contain .button{
	margin-top: -65px;
	margin-left: 535px;
}
.contain .button .save{
	margin-bottom: 5px;
}
.contain .button .save a{
	color : #000;
	margin-bottom: 5px;
/* background-color: #000; */
}
.contain .button .chat a{
	color : #000;
}
/* ปุ่มหัวใจ */
.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
    border-radius: 8px;
}
.btn-primaryc {
    color: #fff;
	background-color: #148F77;
	margin-left: 20px;
}
.typejob{
	color : #194E83;
}
/* .container .row .col-lg-4 .mdl-card .input-group-addon {
    margin-top: -22px;
} */
</style>
		<form action="#" method="POST">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="mdl-card">
								<h5>หางานที่เหมาะกับคุณ</h5>
								<hr>
								<span class="input-group-addon">ชื่องาน :</span>
								<input type="text" name="keyword" id="keyword" placeholder="หางาน" class="form-control" />
								<input type="submit" name="search" id="keyword" value="ยืนยัน" class="form-control" />

								<span class="input-group-addon">ประเภทงาน :</span>
								<ul class="list-group">
									<?php
										// $sql = "SELECT DISTINCT typejob FROM job";
										// $result = $conn->query($sql) or die($conn->error);
										// while($row=$result->fetch_assoc()){
									?>
										<select class="form-control" name="typejob" id="typejob">
											<option select>ประเภทงาน</option>
											<option value="แม่บ้าน">แม่บ้าน</option>
											<option value="คนสวน">คนสวน</option>
											<option value="คนดูแลเด็ก">คนดูแลเด็ก</option>
										</select>
									<!-- <li class="list-group-item">
										<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input product_check" value="<?=$row['typejob'];?>" id="typejob"><?=$row['typejob'];?>
											</label>
										</div>
									</li> -->
									<?php //} ?>
								</ul>
								<span class="input-group-addon">ช่วงอายุ :</span>
								<div>								
									<select class="custom-select mr-sm-2" name="age_min" id="age_min" style="width:40%;">
										<option value="">อายุ</option>
										<option value="50">50</option>
										<option value="60">60</option>
										<option value="70">70</option>
										<option value="80">80</option>
										<option value="90">90</option>
									</select>     
									<span class="add-on bor-cen">ถึง</span>
									<select class="custom-select mr-sm-2" name="age_max" id="age_max" style="width:40%;">
										<option value="">อายุ</option>
										<option value="60">60</option>	
										<option value="70">70</option>
										<option value="80">80</option>
										<option value="90">90</option>
										<!-- <option value="">มากกว่า 90</option> -->
									</select>
									<input type="button" name="age" id="age" value="ยืนยัน" class="form-control" />
								</div>										
								<span class="input-group-addon">ระยะเวลา :</span>
								<ul class="list-group">
									<?php
										$sql = "SELECT DISTINCT workday FROM job ORDER BY workday";
										$result = $conn->query($sql) or die($conn->error);
										while($row=$result->fetch_assoc()){
									?>
									<li class="list-group-item">
										<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input product_check" value="<?=$row['workday'];?>" id="workday"><?=$row['workday'];?> 
											</label>
										</div>
									</li>
									<?php } ?>
								</ul>

								<label for="exampleFormControlInput1">ที่อยู่ :</label>
								<select class="form-control select2-single" name="province" id="province" style="width:100%;">
									<option> -- Select --</option>
								</select>
							
								<select class="form-control select2-single" name="amphur" id="amphur" style="width:100%;">
									<option value="111"> -- Select --</option>
								</select>
							
								<select class="form-control select2-single" name="district" id="district" style="width:100%;">
									<option value=""> -- Select --</option>
								</select><br>
								<input type="submit" name="confirm" id="keyword" value="ยืนยัน" class="form-control" />

							</div>
						</div>	

						<?php
							$sql = "SELECT manageprofile.ID, manageprofile., manageprofile.ID, manageprofile.ID,
									FROM job
									INNER JOIN employer ON job.job_id = employer.job_id
									WHERE employer.job_id='$id'";
							$job = mysqli_query($conn,$sql);	
							$records = mysqli_num_rows($job);
						?>

						<?php
							$request = $_POST['district'];

							$sql = "SELECT * FROM job ";
							if(isset($_POST['search'])){
							$sql .=" WHERE name LIKE '%".$_POST['keyword']."%'";
							}
							if(isset($_POST['confirm'])){
								$sql .=" WHERE district='$request'";
							}
							$sql .= "order by id desc";
							$query = mysqli_query($conn,$sql);	
							$records = mysqli_num_rows($query);
						?>
						<div class="col-lg-8 contain" id="result">
							<p class="record"><?php echo $records;?> ตำแหน่งงาน</p>
						<?php 
							while($objResult = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
						?>
						<?php
							$pro = "SELECT province.PROVINCE_ID, province.PROVINCE_NAME
									FROM province
									INNER JOIN job ON job.province = province.PROVINCE_ID
									WHERE job.province = province.PROVINCE_ID";
							 $sqli = mysqli_query($conn,$pro);
							 $province = mysqli_fetch_array($sqli,MYSQLI_ASSOC)
						?>
						<!-- ตรวจสอบว่ามีการ log in เข้ามา -->
						<?php if(isset($_SESSION['ID'])){ ?>
							<div class="col-lg-8">
								<!-- <a href='showjob.php?id=' เพื่อส่งค่า id ไปหน้า showjob -->
								<h5 class="names"><a href='showjob.php?id=<?=$objResult["id"]?>' class="link_table"><?php echo $objResult["name"];?></a></h5>
								<!-- <h5><a href="showjob.php"><?php echo $objResult["name"];?></a></h5> -->
								<b class="typejob"><?php echo $objResult["typejob"];?></b>
								<p class="mb-0"><b>ที่อยู่ : </b><?php echo $objResult["district"];?>, <?php echo $province["PROVINCE_NAME"];?></p>
								<p class="mb-0"><b>เงินเดือน : </b><?php echo $objResult["salary"];?> บาท</p>
								<p class="mb-0"><b>ระยะเวลา : </b><?php echo $objResult["workday"];?></p>
								<p class="mb-0"><b>วันที่ประกาศงาน : </b><?php echo $objResult["post_date"];?></p>
								<!-- Place this tag in your head or just before your close body tag. -->
								<script src="https://apis.google.com/js/platform.js" async defer></script>
								<!-- Place this tag where you want the share button to render. -->
								<div class="g-plus" data-action="share" data-height="24"></div>
								<!-- <input type="hidden" value="<?=$objResult["id"];?>" name="id"> -->
							</div>
							<hr>
							<div class="col-lg-8">
								<!-- <div class="save"> -->
									<!-- <a href="job.php?id=<?php echo $objResult["id"];?>"><button type="button" class="btn btn-primary">บันทึกงานที่สนใจ</button></a> -->
									<a href="job.php?id=<?php echo $objResult["id"];?>"><button type="button" class="btn btn-primary"> <i class="fa fa-heart fa-1x" aria-hidden="true"></i></button> งานที่สนใจ</a> 
									<a href="chat.php?id=<?php echo $objResult["id"];?>"><button type="button" class="btn btn-primaryc"><i class="fa fa-comments-o fa-1x" aria-hidden="true"></i></button>  </a>แชท
							</div>
								<!-- <div class="chat"> -->
									<!-- <a href="chat.php?id=<?php echo $objResult["chatid"];?>"><button type="button" class="btn btn-success">สนทนา</button></a> -->
									<!-- <button type="button" class="button" style="vertical-align:middle"><span>Hover </span></button> -->
								<!-- </div>
							</div> -->
							<hr>

							<tbody>
							
							</tbody>
							
						<?php }else{ ?>
							<!-- <a href='showjob.php?id=' เพื่อส่งค่า id ไปหน้า showjob -->
							<h5><a href='showjob.php?id=<?=$objResult["id"]?>' class="link_table"><?php echo $objResult["name"];?></a></h5>
							<!-- <h5><a href="showjob.php"><?php echo $objResult["name"];?></a></h5> -->
							<b><?php echo $objResult["typejob"];?></b>
							<p class="mb-0"><?php echo $objResult["place"];?></p>
							<p class="mb-0"><?php echo $objResult["post_date"];?></p>
							<hr>
						<?php } ?>
						<?php } ?>
						<?php //} ?>
						</div>	
								
					</div>
				</div>
			</form>
			<?php
			mysqli_close($conn);
		
		?>
	</body>
	</html><?//}?>
	<!-- รูปสำหรับโหลด -->
	<style>
	#loading{
		text-align:center;
		background: url('loader.gif');
		height: 150px;
	}
	</style>
	
	<!-- chat -->
	<!-- <script>
		$(document).ready(function(){
			load_data();
			function load_data(query=''){
				$.ajax({
						url:"fetch.php",
						method:"post",
						data:{query:query},
						success:function(data){
							$('tbody').html(data);
						}
				});
			}
		});
	</script> -->
	<!-- ตัวกรองประเภทงาน -->
	<script>
		$(document).ready(function(){
			$("#typejob").on('change',function(){

				var value = $(this).val();
				$.ajax({
						url:"fetchs.php",
						type:"POST",
						data:'request='+value,
						beforeSend:function(){
							$("#result").html('Working on..');
						},
						success:function(data){
							$("#result").html(data);
						},
				});
			});
		});
	</script> 
	<!-- ตัวกรองอายุ -->
	<script>
		$(document).ready(function(){
			$("#age").click('change',function(){

				var age_min = $('#age_min').val();
				var age_max = $('#age_max').val();

				$.ajax({
						url:"fetch_age.php",
						type:"POST",
						data:{age_min:age_min, age_max:age_max},
						beforeSend:function(){
							$("#result").html('Working on..');
						},
						success:function(data){
							$("#result").html(data);
						},
				});
			});
		});
	</script> 
	<!-- ตัวกรองวันที่ทำงาน checkbox -->
	<script>
		$(document).ready(function(){
			$(".product_check").click(function(){
				// $('#result').html('<div id="loading"></div>');
				var action = 'data';
				var workday = get_filter_text('workday');
				var typejob = get_filter_text('typejob');

				$.ajax({
					url:"fetch_data.php",
					method:"POST",
					data:{action:action, workday:workday, typejob:typejob},
					success:function(response){
						$('#result').html(response);
					}
				});
			});
			function get_filter_text(text_id){
				var filterData = [];
				$('#' +text_id+':checked').each(function(){
					filterData.push($(this).val());
				})
				return filterData;
			}
		});
	</script> 
	<!-- ที่อยู่ -->
	<script>
            
            $(function(){
                
                //เรียกใช้งาน Select2
                $(".select2-single").select2();
                
                //ดึงข้อมูล province จากไฟล์ get_data.php
                $.ajax({
                    url:"get_data.php",
                    dataType: "json", //กำหนดให้มีรูปแบบเป็น Json
                    data:{show_province:'show_province'}, //ส่งค่าตัวแปร show_province เพื่อดึงข้อมูล จังหวัด
                    success:function(data){
                        
                        //วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data
                        $.each(data, function( index, value ) {
                            //แทรก Elements ใน id province  ด้วยคำสั่ง append
                              $("#province").append("<option value='"+ value.id +"'> " + value.name + "</option>");
                        });
                    }
                });
                
                
                //แสดงข้อมูล อำเภอ  โดยใช้คำสั่ง change จะทำงานกรณีมีการเปลี่ยนแปลงที่ #province
                $("#province").change(function(){
 
                    //กำหนดให้ ตัวแปร province มีค่าเท่ากับ ค่าของ #province ที่กำลังถูกเลือกในขณะนั้น
                    var province_id = $(this).val();
                    
                    $.ajax({
                        url:"get_data.php",
                        dataType: "json",//กำหนดให้มีรูปแบบเป็น Json
                        data:{province_id:province_id},//ส่งค่าตัวแปร province_id เพื่อดึงข้อมูล อำเภอ ที่มี province_id เท่ากับค่าที่ส่งไป
                        success:function(data){
                            
                            //กำหนดให้ข้อมูลใน #amphur เป็นค่าว่าง
                            $("#amphur").text("");
                            
                            //วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data  
                            $.each(data, function( index, value ) {
                                
                                //แทรก Elements ข้อมูลที่ได้  ใน id amphur  ด้วยคำสั่ง append
                                  $("#amphur").append("<option value='"+ value.id +"'> " + value.name + "</option>");
                            });
                        }
                    });
 
                });
                
                //แสดงข้อมูลตำบล โดยใช้คำสั่ง change จะทำงานกรณีมีการเปลี่ยนแปลงที่  #amphur
                $("#amphur").change(function(){
                    
                    //กำหนดให้ ตัวแปร amphur_id มีค่าเท่ากับ ค่าของ  #amphur ที่กำลังถูกเลือกในขณะนั้น
                    var amphur_id = $(this).val();
                    
                    $.ajax({
                        url:"get_data.php",
                        dataType: "json",//กำหนดให้มีรูปแบบเป็น Json
                        data:{amphur_id:amphur_id},//ส่งค่าตัวแปร amphur_id เพื่อดึงข้อมูล ตำบล ที่มี amphur_id เท่ากับค่าที่ส่งไป
                        success:function(data){
                            
                              //กำหนดให้ข้อมูลใน #district เป็นค่าว่าง
                              $("#district").text("");
                              
                            //วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data  
                            $.each(data, function( index, value ) {
                                
                              //แทรก Elements ข้อมูลที่ได้  ใน id district  ด้วยคำสั่ง append
                              $("#district").append("<option value='" + value.name + "'> " + value.name + "</option>");
                              
                            });
                        }
                    });
                    
                });
                
                //คำสั่ง change จะทำงานกรณีมีการเปลี่ยนแปลงที่  #district 
                $("#district").change(function(){
                    
                    //นำข้อมูลรายการ จังหวัด ที่เลือก มาใส่ไว้ในตัวแปร province
                    var province = $("#province option:selected").text();
                    
                    //นำข้อมูลรายการ อำเภอ ที่เลือก มาใส่ไว้ในตัวแปร amphur
                    var amphur = $("#amphur option:selected").text();
                    
                    //นำข้อมูลรายการ ตำบล ที่เลือก มาใส่ไว้ในตัวแปร district
                    var district = $("#district option:selected").text();
                    
                });
                
                
            });
            
    </script>
    
<script src="js/jquery-2.1.1.min.js"></script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
	
    