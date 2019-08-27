<?php
$id = $_POST['id'];
include_once('config.php');
$sql = "SELECT * FROM manageprofile WHERE ID = $id";
$result = mysqli_query($conn, $sql);
$profile = mysqli_fetch_array($result);
echo json_encode($row);
?>