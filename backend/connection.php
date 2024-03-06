<?php
session_start();
include "crud.php";
$crud = new Crud("127.0.0.1", "root", "", "acar");

// if($crud->conn->connect_error){
//     echo "error in connection";
// }else{
//     echo "success";
// }

if(isset($_GET["registerStudent"])){

    
    // initialization of variables that were called from the client
    $email = $_POST['email'];
    $admission = $_POST['admission'];
    $password = $_POST['password'];
    $names = $_POST['names'];
    $phoneNumber = $_POST['phoneNumber'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $fetch = $crud->fetch_data("select * from students where admNo = '$admission'");

    if(count($fetch) > 0){
        echo "admission_exists";
    }else{

        // crud function to insert data in the database
        $insert = $crud->insert_data("students", ["admNo" => $admission, "courseName"=>$course, "names" => $names, "courseCode" => $course, "email" => $email, "phoneNo" => $phoneNumber, "password" => $hashed_password]);
        
        // what happens next if the insertion was successful otherwise issue a failure error
        if ($insert) {
            echo "successful";
        }else{
            echo "some error occured";
            echo $crud->conn->error;
        }
    }


    
}

if (isset($_GET['loginStudent'])){
    $admission = $_POST['username'];
    $password = $_POST['password'];
    $fetch = $crud->fetch_data("select * from students where admNo = '$admission'");
    if(count($fetch) > 0){
        if(password_verify($password,$fetch[0]["password"])){
            $_SESSION['admission'] = $fetch[0]['admNo'];
            // input other session variables here;
            echo "login_success";
        }else{
            echo password_hash($password, PASSWORD_DEFAULT);
            echo "incorrect_password";
        }
    }else{
        echo "no_user_found";
    }
}


?>