<?php 
    session_start(); 
    include('config.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="home-emy.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <title>Navbar</title>
</head>

    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="home-emy.php">Eldery</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="home-emy.php">หน้าหลัก<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="loginemy.php">Login</a> -->
                    </li>
                    
                    <?php if(isset($_SESSION['id'])){ ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        คุณ : <?php echo $_SESSION['Email']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="add-jobs.php">ลงประกาศงาน</a>
                            <?php 	
                                include('config.php');
                                error_reporting(0);
                                $ID = $_SESSION['id'];

                                if(isset($_GET['id'])) { $id = $_GET['id']; }
                                                
                                $sql = "SELECT ID FROM manageprofile WHERE ID = '$id'";
                                $result = $conn->query($sql) or die($conn->error);
                                $row=$result->fetch_assoc();
                            ?>
                            <?php 
                                $sql = "SELECT * FROM employer";
                                $result = $conn->query($sql) or die($conn->error);
                                $ro=$result->fetch_assoc();

                                $Ids = $ro['job_id'];
                            ?>
                            <a class="dropdown-item" href="view-resume.php?id=<?php echo $id;?>">ผู้ที่สนใจสมัครงาน<?php echo $id;?></a>
                            <a class="dropdown-item" href="Job_post.php">งานที่ลงประกาศไว้</a>
                            <a class="dropdown-item" href="chat.php?id=<?php echo $Ids;?>">สนทนา</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout-emy.php">ออกจากระบบ</a>
                        </div>
                        
                    </li> 
                    <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="loginemy.php">เข้าสู่ระบบ</a>
                    </li>                    
                    <?php }?>
                    </ul>
                </div>
            </nav>
            <hr>
        </div>
    </header>    
</html>

