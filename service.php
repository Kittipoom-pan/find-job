<?php    
        
        // $hostname_conn_database = "localhost";
        // $username_conn_database = "root";
        // $password_conn_database = "";
        // $database_conn_database = "Employee";
        // // Create connection
        // $conn = mysqli_connect($hostname_conn_database, $username_conn_database, $password_conn_database, 
        //                         $database_conn_database);
        
    //     if(!$conn)
    //     {
    //         die("Connection failed:" .$conn->connect_error);
    //     }

    //     $method = $_SERVER['REQUEST_METHOD'];
    //     if($method == "GET"){
    //         $sql = "SELECT * FROM manageprofile";
    //         $result = mysqli_query($conn, $sql);
    //         $rows = array();

    //     if(mysqli_num_rows($result) > 0){
    //         while($r = mysqli_fetch_assoc($result)){
    //             array_push($rows, $r);
    //         }
    //         print json_encode($rows);
    //     }else{
    //         echo "No data";
    //     }
    // }
    // else if($method == "POST")
    // {
    //     $FirstName = $_POST['Firstname'];
    //     $LastName = $_POST['Lastname'];
    //     $GenDer = $_POST['Gender'];
    //     $AgE = $_POST['Age'];
    //     $EmaiL = $_POST['Email'];
    //     $LinE = $_POST['Line'];
    //     $PhonE = $_POST['Phone'];
    //     $AddresS = $_POST['Address'];
    //     $TypejoB = $_POST['Typejob'];
    //     $NumberofworkingdayS = $_POST['Numberofworkingdays'];
    //     $HowmanyrateS = $_POST['Howmanyrates'];

    //     $sql_insert = "INSERT INTO manageprofile(ID, Firstname, Lastname, Gender, Age, Email, Line, Phone, Address, Typejob, 
    //     Workingdays, Howmanyrates) VALUES (0, '$FirstName', '$LastName', '$GenDer', '$AgE', '$EmaiL', '$LinE', '$PhonE', '$AddresS', 
    //     '$TypejoB', '$NumberofworkingdayS', '$HowmanyrateS' )";

    //     if(mysqli_query($conn, $sql)){
    //         echo "ID successfully added to the database";
    //     }
    //     else{
    //         echo "ERROR: $sql_insert did not run. ".mysqli_error($conn);
    //     }

    // }
    // mysqli_close($conn);
?>
