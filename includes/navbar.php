<?php
//ปิดออเร่อ
error_reporting(0);

if(isset($_GET['id'])) { 
    $id = $_GET['id']; 
}
$id=$_GET["id"];

// if($id != ""){ 
//     setcookie ("CookieID","$id",time()+1000 ); 
// } // มี id

// if($_COOKIE["CookieID"] != "" ){//มี คุกกี้
// if( $id == ""){$id = $CookieID; } // ไม่มี id
// }

// if($id == "" ){ // ไมมี id
// if($_COOKIE["CookieID"] ==""){ $id="Company" ; setcookie ("CookieID","$id",time()+1000 ); } //ไม่มี คุกกี้
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel = "stylesheet" type = "text/css" href = "style.css" >
    <!-- <link rel = "stylesheet" type = "text/css" href = "nav.css" > -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <script src="animation.js"></script>
    
    <title>Navbar</title>
</head>
<?php 
    include_once('config.php');
?>
<header>
<div class="wrapper">
        <nav>
            <div class="menu-icon">
                <i class="fa fa-bars fa-2x"></i>
            </div>
            <div class="logo">
                <a href=home.php><img src="img/logo.png" alt="eldery"></a>
            <div class="menu">
                <ul> 
                
                    <li><a href="home.php">หน้าแรก</a></li>
                    <li><a href="job.php">งานทั้งหมด</a></li>
                    
                 
                    <?php if(isset($_SESSION['ID'])){ ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        คุณ : <?php echo $_SESSION['Email']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <!-- <a class="dropdown-item" href="job.php">ค้นหางาน</a> -->
                            <a class="dropdown-item" href="manageprofiles.php">จัดการประวัติส่วนตัว</a>
                            <?php 
                                // if(isset($_GET['id'])) { 
                                //     $id = $_GET['id']; 
                                // }
                                // $sql = "SELECT id FROM job WHERE id = '$id'";
                                // $result = $conn->query($sql) or die($conn->error);
                                // $row=$result->fetch_assoc();
                                //$id=$_GET["id"];
                            ?>
                            <a class="dropdown-item" href="save_job.php?id=<?php echo $id;?>">งานที่สนใจ<?php echo $id;?></a>
                            <!-- <a class="dropdown-item" href="show-resume.php">เรซูเม่</a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">ออกจากระบบ</a>
                        </div>
                    </<a> 
                    <?php }else{ ?>
                     <li><a href="loginemy.php"><button type="button" class="btn btn-outline-light">ผู้ประกอบการ</button></a><li>
                    <li><i class="fa fa-lock" class="modal1"></i><a href="login.php">เข้าสู่ระบบ</a> | <i class="fa fa-user"></i><a href="register.php">สมัครสมาชิก</a></li> 
              
                    <?php }?>
                </ul>
            </div>
        </nav>
    </header> 
</div>       

<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>

<script>
     $(document).ready(function(){
        $('.modal1').modal();
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".menu-icon").on("click", function(){
            $("nav ul").toggleClass("showing");
        });
    });

    $(window).on("scroll", function(){
        if($(window).scrollTop()){
            $('nav').addClass('black');
        }else{
            $('nav').removeClass('black');
        }
    })
</script>


