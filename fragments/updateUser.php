<?php
//move the uploaded file into my directory
if(!empty($_FILES['user-profile']))
{
    $path ="../img/";
    $path = $path . basename($_FILES['user-profile']['name']);
    if(move_uploaded_file($_FILES['user-profile']['tmp_name'],$path)){
    } else {
        echo "There was an error uploading the file, please try again";
    }
}

// updating the sql row, if only instert it would only create a new row, not update the current one
// also navigate back to the home page 

if(!empty($_POST)){
    $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');

    if($mysqli->connect_error){
        die("Connection Error: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
    }

    $id = $_GET['id'];
    $UsrName = $_POST['reg-name'];
    $pass = $_POST['reg-password'];

    //setting default image
    if($_FILES['user-profile']["error"] == 4) {
        $userProfile = "default-profile.png";   
    } else {
        $userProfile = $_FILES['user-profile']['name'];
    }

    $email = $_POST['reg-email'];

    $sql = "UPDATE users SET username = '$UsrName', password = '$pass', userprofileimg = '$userProfile', email = '$email' WHERE id = $id";
    $insert = $mysqli->query($sql);

    $update = $mysqli->query($sql);

    if($insert){
        echo 'Success {$mysqli->insert_id}';
    } else {
        die("Error: {$mysqli->errno} : {$mysqli->error}");
    }

    $mysqli->close();

    header("location:../home.php");

} 
?>