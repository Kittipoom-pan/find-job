<?php 
    include_once('config.php');
    if(isset($_SESSION['ID'])){   
        $id = $_SESSION['ID'];
    }   
    if(isset($_POST['update'])){
    // echo 'name :'.$_FILES['fileupload']['name'].'<br>'; 
        $ID = $_GET['ID'];
        $fnames = $_POST['Firstname'];
        $lnames = $_POST['Lastname'];
        $genders = $_POST['Gender'];
        $ages = $_POST['Age'];
        $emails = $_POST['Email'];
        $phones = $_POST['Phone'];
        $addresss = $_POST['Address'];
        $salarys = $_POST['Salary'];
        $provinces = $_POST['Province'];
        $dists = $_POST['District'];


        // $temp = explode('.',$_FILES['fileupload']['name']);
        // $newName = round(microtime(true)).'.'. end($temp);

        // if(move_uploaded_file($_FILES['fileupload']['tmp_name'],'uploads/'.$newName)){
            $sql = "UPDATE manageprofile SET Firstname = '".$fnames."', Lastname = '".$lnames."', Age = '".$ages."', Gender = '".$genders."', Email = '".$emails."', Province = '".$provinces."', 
                    District = '".$dists."', Phone = '".$phones."', Address = '".$addresss."', Salary = '".$lnames."' WHERE ID='".$ID."'";
            $result = $conn->query($sql);
            $id = mysqli_insert_id($conn);

            for($i = 0; $i < count($_POST['category']); $i++){
                $title = $_POST['titlejob'][$i];
                $category = $_POST['category'][$i];
                $des = $_POST['description'][$i];
                $start = $_POST['date_start'][$i];
                $datestop = $_POST['date_stop'][$i];

                $sql = "UPDATE experience SET title_job = '".$title."', category = '".$category."', description = '".$des."', date_start = '".$start."',  date_stop = '".$datestop."' WHERE id='".$ID."'";
                mysqli_query($conn, $sql);
            }
   
            foreach($_POST['special'] as $quals) {
                if(empty($quals)) {
                    continue;
                }
                $sql = "UPDATE special SET condition_text = '".$quals."' WHERE id='".$ID."'";
                $r2 = mysqli_query($conn, $sql);
            }
            foreach($_POST['skill'] as $qual) {
                if(empty($qual)) {
                    continue;
                }
                $sql = "UPDATE skill SET skill_text = '".$qual."' WHERE id='".$ID."'";
                $r2 = mysqli_query($conn, $sql);
            }
            foreach($_POST['categoryJob'] as $cate) {
                if(empty($cate)) {
                    continue;
                }
                $sql = "UPDATE jobCategory SET category = '".$cate."' WHERE id='".$ID."'";
                $r2 = mysqli_query($conn, $sql);
            }
            foreach($_POST['disease'] as $dis) {
                if(empty($dis)) {
                    continue;
                }
                $sql = "UPDATE disease  SET disease_text = '".$dis."' WHERE id='".$ID."'";
                $r2 = mysqli_query($conn, $sql);
            }
     
            if($result){ ?>
                <script language="JavaScript">alert("ข้อมูลถูกจัดเก็บเรียบร้อยแล้ว \r\n\r\n");</script>
                <script language="JavaScript">window.location.href = "manageprofiles.php";</script> 
            <?//}
            }else{
                echo '<script> alert("ข้อมูลของท่านไม่ถูกจัดเก็บ กรุณากรอกข้อมูลใหม่")</script>';
            }
        }
    
    ?>