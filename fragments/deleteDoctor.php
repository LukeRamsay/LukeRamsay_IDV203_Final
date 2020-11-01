<?php 
    $id = $_GET['id'];

    $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');

    if($mysqli->connect_error){
        die("Connection Error: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
    }

    //removing rows where id is equal to the id of doctor you clicked on
    $sql = "DELETE FROM doctors WHERE id = $id";

    if(mysqli_query($mysqli, $sql)){
        mysqli_close($mysqli);
        header('Location: ../home.php');
        exit;
    } else {
        echo "Error deleting Record";
    } 
?>