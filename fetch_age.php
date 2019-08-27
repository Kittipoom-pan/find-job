<?php 
if(isset($_POST["age_min"]))
{
    // $request = $_POST['request'];
    include_once('config.php');
    $sql = "SELECT * FROM job WHERE '".$_POST["age_min"]."' >= MIN_AGE AND '".$_POST["age_max"]."' <= MAX_AGE";
    // $s = "SELECT * FROM AGE_RANGE WHERE 10 >= MIN_AGE AND 10 <= MAX_AGE";
    //SELECT * FROM AGE_RANGE WHERE 10 BETWEEN MIN_AGE AND MAX_AGE; 
    $query = mysqli_query($conn,$sql);
    $records = mysqli_num_rows($query);

    $output="<p class='record'>".$records." ตำแหน่งงาน</p>";

    while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) { 
            $output .="<h5><a href='showjob.php?id=".$row["id"]."'>".$row["name"]."</a></h5>
            <b>".$row["typejob"]."</b>
            <p class='mb-0'>".$row["place"]."</p>
            <p class='mb-0'>".$row["post_date"]."</p>
            <a href='job.php?id=".$row["id"]."'><i class='fa fa-save' aria-hidden='true'></i></a>
            <a href='chat.php?id=".$row["chatid"]."'><i class='fa fa-comments-o' aria-hidden='true'></i></a>
            <hr>";
        }
        echo $output;
        mysqli_close($conn); 
};
?>