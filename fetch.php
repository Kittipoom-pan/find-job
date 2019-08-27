<?php
include_once('config.php');
$output = '';
$sql = "SELECT * FROM job WHERE name LIKE '%".$_POST['search']."%'"; 

$result = mysqli_query($conn, $sql);
$output .="<h3>serch</h3>";

if(mysqli_num_rows($result)>0){
    $output .= ' <div class="col-lg-8">';       
                
    
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
				{ 
                $output .= "
							<h5><a href='showjob.php'>".$row["name"]."</a></h5>
							<h6>".$row["typejob"]."</h6>
							<p class='mb-0'>".$row["description"]."</p>
                            <script src='https://apis.google.com/js/platform.js' async defer></script>
							<div class='g-plus' data-action='share' data-height='24'></div>
							<a href='chat.php'><i class='fa fa-comments-o' aria-hidden='true'></i></a>
							<hr>
							";
                }
                $output.="</div>";
                echo $output;
}else{
    echo 'Data not found';
}
?>
