<?php    
        // session_start();
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $hostname_conn_database = "localhost";
        $username_conn_database = "root";
        $password_conn_database = "";
        $database_conn_database = "Employee";
        
        $conn = mysqli_connect($hostname_conn_database, $username_conn_database, $password_conn_database, 
                                $database_conn_database);
        mysqli_query($conn,"SET NAMES UTF8");
        
        if(!$conn)
        {
            die("Connection failed:" .$conn->connect_error);
        }
        

    // $method = $_SERVER['REQUEST_METHOD'];
    // if($method == "GET"){
    //     $sql = "SELECT * FROM employee";
    //     $result = mysqli_query($conn, $sql);
    //     $rows = array();

    // if(mysqli_num_rows($result) > 0){
    //     while($r = mysqli_fetch_assoc($result)){
    //     array_push($rows, $r);
    //     }    
    //     print json_encode($rows);
    //     }else{
    //         echo "No data";
    //     }
    // }
    // else if($method == "POST")
    // {
    //     $firstname = $_POST['Firstname'];
    //     $lastname = $_POST['Lastname'];
    //     $gender = $_POST['Gender'];
    //     $age = $_POST['Age'];
    //     $email = $_POST['Email'];
    //     $password = $_POST['Password'];
    //     $confirmpasword = $_POST['ConfirmPasword'];

    //     $sql_insert = "INSERT INTO employee(ID, Firstname, Lastname, Gender, Age, Email, Password, ConfirmPassword) VALUES 
    //     (0, '$firstname', '$lastname', '$gender', '$age', '$email', '$password', '$confirmpassword', )";

    //     if(mysqli_query($conn, $sql)){
    //         echo "ID successfully added to the database";
    //     }
    //     else{
    //         echo "ERROR: $sql_insert did not run. ".mysqli_error($conn);
    //     }

    // }
    // mysqli_close($conn);
    
?>

