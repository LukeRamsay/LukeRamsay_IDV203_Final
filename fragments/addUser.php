<?php

if(!empty($_POST['reg-username']) || !empty($_POST["reg-password"]) || !empty($_FILES['user-profile'])){
    $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');

    unset($GLOBALS['message']);

    if($mysqli->connect_error){
        die("Connection Error: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
    }

    $path ="../img/";
    $path = $path . basename($_FILES['user-profile']['name']);
    if(move_uploaded_file($_FILES['user-profile']['tmp_name'],$path)){
    } else {
        $message = 'select an image';
    }

    if($_FILES['user-profile']["error"] == 4) {
        $userProfile = "default-profile.png";   
    } else {
        $userProfile = $_FILES['user-profile']['name'];
    }
    
    // php to make input only take certain type of values like only letters
    // $name = $_POST['reg-username'];
    // if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    // $nameErr = "Only letters and white space allowed";
    // } 

    //Php to validate forms are completed
    // if (empty($_POST["name"])) {
    //     $nameErr = "Name is required";
    //   } else {
    //     $name = test_input($_POST["name"]);
    //   }
    
    //   if (empty($_POST["email"])) {
    //     $emailErr = "Email is required";
    //   } else {
    //     $email = test_input($_POST["email"]);
    //   }

    $username = $_POST['reg-username'];

    $checkQuery = "SELECT * FROM users WHERE username = '.$username.'";
    $userResult = mysqli_query($mysqli, $checkQuery);
    //Same issues as add doctor
    //Tried some things
    // unset($UserResult, $checkQuery, $username);

    // $checkUsername = "SELECT * FROM users WHERE username = '.$userName.'";
    // $result = mysqli_affected_rows($mysqli ,$checkUsername);
    if(mysqli_num_rows($userResult) > 0){
        $message = '<label>That Username Already Exists</label>';
        header("location:../login.php");
    } else {

    $sql = "INSERT INTO users(username, password, userprofileimg, email) VALUES(
        '{$mysqli->real_escape_string($_POST['reg-username'])}',
        '{$mysqli->real_escape_string($_POST['reg-password'])}',
        '{$userProfile}',
        '{$mysqli->real_escape_string($_POST['reg-username'])}'
        )";

    $insert = $mysqli->query($sql);

    if($insert){
        echo 'Success {$mysqli->insert_id} '.$nameErr.' ';
    } else {
        die("Error: {$mysqli->errno} : {$mysqli->error}");
    }

    $mysqli->close();


    header("location:../login.php");

    }
}
?>