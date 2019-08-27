<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<style>
body{
    background-color: darkseagreen;
}
h2{
    /* margin-top:170px;
    text-align:center; */
}
.containe h2{
    margin-top:70px;
    text-align:center;
    color: white;
}
.contain{
    padding: 30px 30px;
    margin-top: 50px;
    margin-left: auto;
    margin-right: auto;
    -webkit-box-shadow: 2px 2px 4px 0 rgba(0,0,0,.2);
    box-shadow: 2px 2px 4px 0 rgba(0,0,0,.2);
    border: 1px solid #f1f1f1;
    background-color: beige;

}
.view{
    margin-top: 10px;
}
.mb{
    margin-top: -23px;
    margin-left: 22px;
}
.mb-0{
    margin-top: 5px;
}
h5{
    color:#2872c1;
}
</style>
<?php //include_once('navbar-emy.php'); ?>
<?php 	include('config.php'); 
//include('loginemy.php');?>

<body>
<div class="containe">
    <h2>งานที่ลงประกาศไว้</h2>
    <div class="col-lg-8 contain">
            <?php 
            $id = $_SESSION['id'];
	
            $sql = "SELECT job.id,job.name, job.typejob, job.place,job.job_view
                    FROM job
                    INNER JOIN employer ON job.job_id = employer.job_id
                    WHERE employer.job_id='$id'";
                    $query = mysqli_query($conn,$sql);

			    while($objResult = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
                    $ID = $objResult['id'];
			?>
				<h5><?php echo $objResult["name"];?></h5>
				<b><?php echo $objResult["typejob"];?></b>
				<p class="mb-0"><?php echo $objResult["place"];?></p>
                <div class="view">
                <i class="fa fa-eye" aria-hidden="true"></i><p class="mb"><?php echo $objResult["job_view"];?> จำนวนคนที่เข้ามาดู</p>
                <hr>
                <a href="edit-job.php?GetID=<?php echo $ID?>"><button type="button" class="btn btn-primary">Edit</button></a>
                </div>
				<hr>
        <?php } ?>
    </div>	
</div>   
</body>
</html>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>