<?php
$jsondata = file_get_contents("config.php");
$obj = json_decode($jsondata,true);

// echo $json['employee'][0]['ID'];

foreach($obj as $result){
    $output.="ID : ".$employee['id']."<br />";
} 
?>