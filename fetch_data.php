<?php
include('config.php');

if(isset($_POST["action"])){
    $sql = "SELECT * FROM job WHERE name !=''";

    if(isset($_POST["workday"])){
        $workday = implode("','", $_POST['workday']);
        $sql .="AND workday IN('".$workday."')";
    }
    if(isset($_POST["typejob"])){
        $typejob = implode("','", $_POST['typejob']);
        $sql .="AND typejob IN('".$typejob."')";
    }
    $result = $conn->query($sql);
    $records = mysqli_num_rows($result);

    $output="<p class='record'>".$records." ตำแหน่งงาน</p>";

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            
            $output .="
            <h5><a href='showjob.php?id=".$row["id"]."'>".$row["name"]."</a></h5>
            <b>".$row["typejob"]."</b>
            <p class='mb-0'>".$row["place"]."</p>
            <p class='mb-0'>".$row["post_date"]."</p>
            <a href='job.php?id=".$row["id"]."'><i class='fa fa-save' aria-hidden='true'></i></a>
            <a href='chat.php?id=".$row["chatid"]."'><i class='fa fa-comments-o' aria-hidden='true'></i></a>
            <hr>";
        }
					
    }
    else{
        $output = "<h3>ไม่มีงานที่คุณค้นหา</h3>";
    }
    echo $output;
}
?>