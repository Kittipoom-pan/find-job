<?php 
require_once("config.php");
$ID = $_GET['GetID'];
$query = "select * from job where id='".$ID."'";
$result = mysqli_query($conn , $query);

while($row=mysqli_fetch_assoc($result))
{
    $ID = $row['id'];
    $Name = $row['name'];
    $Jobcategory = $row['typejob'];
    $place = $row['place'];
    $province = $row['province'];
    $amphur = $row['amphur'];
    $district = $row['district'];
    $postcode = $row['postcode'];
    $quantity = $row['quantity'];
    $salary = $row['salary'];
    $workday = $row['workday'];
}
?>
<style>
.bg {
    background-color: darkseagreen;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Admin</title>
</head>
<body class="bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-title">
                        <h3 class="bg-success text-white text-center py-3">Update</h3>
                    </div>
                    <div class="card-body">
                        <form action="update-job.php?ID=<?php echo $ID?>" method=post>
                            <input type="text" class="form-control mb-2" placeholder="Job" name="job" value="<?php echo $Name?>">
                            <input type="text" class="form-control mb-2" placeholder="Job category" name="jobcategory" value="<?php echo $Jobcategory?>">
                            <input type="text" class="form-control mb-2" placeholder="Description" name="place" value="<?php echo $place?>">
                            <input type="text" class="form-control mb-2" placeholder="Description" name="province" value="<?php echo $province?>">
                            <input type="text" class="form-control mb-2" placeholder="Description" name="amphur" value="<?php echo $amphur?>">
                            <input type="text" class="form-control mb-2" placeholder="Description" name="district" value="<?php echo $district?>">
                            <input type="text" class="form-control mb-2" placeholder="Description" name="postcode" value="<?php echo $postcode?>">
                            <input type="text" class="form-control mb-2" placeholder="Description" name="quantity" value="<?php echo $quantity?>">
                            <input type="text" class="form-control mb-2" placeholder="Description" name="salary" value="<?php echo $salary?>">
                            <input type="text" class="form-control mb-2" placeholder="Description" name="workday" value="<?php echo $workday?>">
                            <button class="btn btn-primary" name="update">Update</button>
                            <a href="index.php"><button type="button" class="btn btn-warning" >Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script src="js/jquery-2.1.1.min.js"></script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
