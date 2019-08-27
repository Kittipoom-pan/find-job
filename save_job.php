<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Document</title>
    <?php include_once('includes/navbar.php'); ?>
</head>
<style>
h2{
    margin-top:-80px;
    text-align:center;
}
p{
    /* color:white; */
}
.contain{
    padding: 30px 30px;
    margin-top: 50px;
    margin-left: auto;
    margin-right: auto;
    -webkit-box-shadow: 2px 2px 4px 0 rgba(0,0,0,.2);
    box-shadow: 2px 2px 4px 0 rgba(0,0,0,.2);
    border: 1px solid #f1f1f1;
    background-color: #fff;
}
body{
    position: relative;
    background: url("img/19268.jpg");
    min-height: 150vh;
    background-size: cover;
    background-position: center;
    padding: 250px 0 200px;
}
</style>
<body>
   
<div class="container">
    <h2><b>งานที่บันทึกไว้</b></h2>
    <div class="col-lg-8 contain">
        <?php 
            if(isset($_GET['id'])) { 
                $id = $_GET['id']; 
            }
			$sql = "select * from job WHERE id='$id'";
			$query = mysqli_query($conn,$sql);	
			while($objResult = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
			?>
				<h5><a href='showjob.php?id=<?=$objResult["id"]?>' class="link_table"><?php echo $objResult["name"];?></a></h5>
				<b><?php echo $objResult["typejob"];?></b>
				<p class="mb-0"><?php echo $objResult["place"];?></p>
				<hr>
        <?php } ?>
    </div>	
</div>
</body>

</html>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>