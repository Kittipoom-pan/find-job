<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<title>Document</title>
<?php include_once('navbar-emy.php');?>
<style>
	input[type=text], textarea {
		font-size: 16px;
		padding: 3px;
		border: solid 1px gray;
		background: #fff;
		margin: 9px 5px 5px 0px;
	}
	input[name=position] {
		width: 450px;
	}
	input[name=quantity] {
		width: 150px;
	}
	textarea {
		width: 613px;
		height: 50px;
		font-size: 14px !important;
		resize: none;
	}
	input[name='qualification[]'] {
		display: block;
		background-color:white;
		width: 100%;
		height: calc(2.25rem + 2px);
		padding: .375rem .75rem; 
		font-size: 1rem; 
		line-height: 1.5;
		color: #495057; */
		background-color: #fff;
		background-clip: padding-box;
		border: 1px solid #ced4da;
		border-radius: .25rem;
		transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
	}
	form div {
		width: 620px;
		margin-top: 10px;
	}
	#ok {
		float: right;
	}
	h4 {
		text-align: center;
		color: green;
	}
	h4 > img {
		vertical-align: middle;
		margin-right: 5px;
	}
	form{
		max-width: 650px;
		margin: 10px auto;
		padding: 10px 20px;
		background: white;
		border-radius: 8px;
		box-shadow:  0px 2px 8px 0px #333;
		margin-top:140px;
	}
	.form-control select2-single{
		margin-top: 10px;
	}
	.control{
		width: 30%;
		height: calc(2.25rem + 2px);
		padding: .375rem .75rem;
		font-size: 1rem;
		line-height: 1.5;
		color: #495057;
		background-color: #fff;
		background-clip: padding-box;
		border: 1px solid #ced4da;
		border-radius: .25rem;
		transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
	}	
</style>
<script src="js/jquery-2.1.1.min.js"></script>
<!-- <script>
$(function() {
	$('#add').click(function() {
		var content = '<input type="text" name="qualification[0]" class="form-control" id="" placeholder="">';
		if($('input[name="qualification[0]"]').length < 10) {
			$('input[name="qualification[0]"]:last').after(content);
		}
	});
		$('#add').click();	
	
	$('#delete').click(function() {
		if($('input[name="qualification[0]"]').length > 1) {
			$('input[name="qualification[0]"]:last').remove();
		}
	});
});
</script>
<script>
$(function() {
	$('#adds').click(function() {
		var content = '<input type="text" name="benefit[0]" class="form-control" id="" placeholder="">';
		if($('input[name="benefit[0]"]').length < 10) {
			$('input[name="benefit[0]"]:last').after(content);
		}
	});
		$('#adds').click();	
	
	$('#deletes').click(function() {
		if($('input[name="benefit[0]"]').length > 1) {
			$('input[name="benefit[0]"]:last').remove();
		}
	});
});
</script> -->
<script>
	function sliderChange(val){
		document.getElementById('status').innerHTML = val;
	}
</script>

</head>
<body>
        <?php
            if($_POST) {
				include "config.php";
				$strSQL = "INSERT INTO job (name,job_id,typejob,place,province,amphur,district,postcode,quantity,MIN_AGE,MAX_AGE,salary,workday) VALUES 
				( '".$_POST['name']."','".$_POST['job_id']."', '".$_POST['typejob']."', '".$_POST['place']."','".$_POST['province']."','".$_POST['amphur']."',
				'".$_POST['district']."','".$_POST['postcode']."','".$_POST['quantity']."', '".$_POST['mina']."', '".$_POST['maxa']."','".$_POST['salary']."','".$_POST['workday']."')";
				$objQuery = mysqli_query($conn,$strSQL);
				$id = mysqli_insert_id($conn);
				for($i=0; $i < count($_POST['qualification']); $i++){
					$qual = $_POST['qualification'][$i];

					$sql = "REPLACE INTO qualification VALUES('', '$id', '$qual')";
					mysqli_query($conn, $sql);
				}
				for($i = 0; $i < count($_POST['benefit']); $i++){
					$benefit = $_POST['benefit'][$i];

					$sql = "REPLACE INTO benefit VALUES('', '$id', '$benefit')";
					mysqli_query($conn, $sql);
				}
				for($i = 0; $i < count($_POST['description']); $i++){
					$des = $_POST['description'][$i];

					$sql = "REPLACE INTO description VALUES('', '$id', '$des')";
					mysqli_query($conn, $sql);
				}
                // foreach($_POST['qualification'] as $qual) {
                //     if(empty($qual)) {
                //         continue;
                //     }
                //     $sql = "REPLACE INTO qualification VALUES('', '$id', '$qual')";
                //     $r2 = mysqli_query($conn, $sql);
				// }
				if($objQuery){
					echo '<script> alert("จัดการเพิ่มงานลงฐานข้อมูลเรียบร้อย")</script>'; 
					echo '<script language="JavaScript">window.location.href = "home-emy.php";</script>';
				}else{
					echo '<script> alert("เพิ่มข้อมูลไม่สำเร็จ")</script>';
				}
				mysqli_close($conn);
				//เก็บค่าไอดีงานเอาไว้
				$_SESSION['id'] = $id;
			}
			?>
			<fieldset>
            <form method="post">
			<legend>โพสต์งาน</legend>
			<hr>
				<?php 
					if(isset($_GET['id'])) { $id = $_GET['id']; }
					else if(isset($_SESSION['id'])){
						$id = $_SESSION['id'];
					}
					include "config.php";
					$sql = "SELECT * FROM employer WHERE job_id = $id";
					$result = mysqli_query($conn, $sql);
					$job = mysqli_fetch_array($result);
				?>
				<!-- เพิ่ม id ลงในฐานข้อมูล -->
				<input type="hidden" name="job_id" value="<?=$job['job_id']?>" >

				<label for="exampleFormControlInput1">ชื่องาน :</label>
				<input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="" required>
				<label for="exampleFormControlSelect1">ประเภทงาน :</label>
				<select class="form-control" name="typejob" id="exampleFormControlSelect1">
					<option select>ประเภทงาน</option>
					<option>แม่บ้าน</option>
					<option>คนสวน</option>
					<option>คนดูแลเด็ก</option>
				</select>

				รายละเอียดงาน : 
				<input type="text" name="description[0]" class="form-control" id="exampleFormControlInput1" placeholder="" required>
				<input type="text" name="description[1]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<input type="text" name="description[2]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<input type="text" name="description[3]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<input type="text" name="description[4]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<input type="text" name="description[5]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<input type="text" name="description[6]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<input type="text" name="description[7]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<br>
				จำนวนกี่อัตรา : 0<input type="range" id="range" name="quantity" value="5" min="0" max="10" step="1" onChange="sliderChange(this.value)"/> 10
				<span id="status">5</span>คน<br>
				<label for="exampleFormControlSelect1">ช่วงอายุ :</label>
				<select class="custom-select mr-sm-2" name="mina" style="width:15%;">
					<option value="">อายุ</option>
					<option value="50">50</option>
					<option value="60">60</option>
					<option value="70">70</option>
					<option value="80">80</option>
					<option value="90">90</option>			
				</select>ถึง 
				<select class="custom-select mr-sm-2" name="maxa" style="width:15%;">
					<option value="">อายุ</option>
					<option value="60">60</option>
					<option value="70">70</option>
					<option value="80">80</option>
					<option value="90">90</option>
					<!-- <option value="">มากกว่า 90</option> -->
				</select>
				<br>
				

				<label for="exampleFormControlInput1">ที่อยู่ :</label>
				<input type="text" name="place" class="form-control" id="exampleFormControlInput1" placeholder="บ้านเลขที่, หมู่บ้าน, ตรอก/ซอย, ถนน" required> 
				<select class="form-control select2-single" name="province" id="province" style="width:100%;">
                    <option> -- Select --</option>
 				</select>
			
				<select class="form-control select2-single" name="amphur" id="amphur" style="width:100%;">
                    <option value="111"> -- Select --</option>
                </select>
			
				<select class="form-control select2-single" name="district" id="district" style="width:100%;">
                    <option value=""> -- Select --</option>
                </select><br>
				<tr>
					<td>เลขที่ไปรษณีย์ :</td>
					<td><input type="text"  class="control"name="postcode" id="exampleFormControlInput1" placeholder=""></td>
				</tr><br>
				
				อัตราเงินเดือน :
				<select class="custom-select mr-sm-2" name="salary" id="inlineFormCustomSelect" style="width:25%;" >
					<option selected>เงินเดือน</option>
					<option value="10,000">10,000</option>
					<option value="15,000">15,000</option>
					<option value="20,000">20,000</option>
					<option value="25,000">25,000</option>
					<option value="30,000">30,000</option>
					<option value="35,000">35,000</option>
					<option value="40,000">40,000</option>
					<option value="45,000">45,000</option>
					<option value="ตามที่ตกลง">ตามที่ตกลง</option>
				</select><br>
	
				จำนวนวันในการทำงาน : <br>
				<input type="radio" name="workday" value="รายชั่วโมง" checked> รายชั่วโมง<br>
				<input type="radio" name="workday" value="ีรายวัน"> รายวัน<br>
				<input type="radio" name="workday" value="รายอาทิตย์"> รายอาทิตย์<br>
				<input type="radio" name="workday" value="รายเดือน"> รายเดือน<br>
				<input type="radio" name="workday" value="รายปี"> รายปี<br>
				<input type="radio" name="workday" value="ตามที่ตกลง"> ตามที่ตกลง<br>

				คุณสมบัติ : 
				<input type="text" name="qualification[0]" class="form-control" id="exampleFormControlInput1" placeholder="" required>
				<input type="text" name="qualification[1]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<input type="text" name="qualification[2]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<input type="text" name="qualification[3]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<input type="text" name="qualification[4]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<input type="text" name="qualification[5]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<input type="text" name="qualification[6]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<input type="text" name="qualification[7]" class="form-control" id="exampleFormControlInput1" placeholder="">

				สวัสดิการ : 
				<input type="text" name="benefit[0]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<input type="text" name="benefit[1]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<input type="text" name="benefit[2]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<input type="text" name="benefit[3]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<input type="text" name="benefit[4]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<input type="text" name="benefit[5]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<input type="text" name="benefit[6]" class="form-control" id="exampleFormControlInput1" placeholder="">
				<input type="text" name="benefit[7]" class="form-control" id="exampleFormControlInput1" placeholder="">

				<br>

				<!-- <button type="button" class="btn btn-primary" id="adds">เพิ่ม</button>
				<button type="button" class="btn btn-warning"id="deletes">ลด</button> -->

              
					<button type="reset" class="btn btn-dark" id="cancel">ลบข้อมูล</button>
					<button type="submit" class="btn btn-primary" id="ok">ส่งข้อมูล</button>
                
			</form>
			</fieldset>
<aside> <?php //include "side-menu.php"; ?></aside>
</div> 
<?php //include "footer.php";  ?>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
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