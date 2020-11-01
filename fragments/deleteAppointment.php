<?php 

    $id = $_GET['id'];

    $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');
    
    if($mysqli->connect_error){
        die("Connection Error: " . $mysqli->connect_errno . ':' . $mysqli->connec_error);
    }
    //removing rows where id is equal to the id of appointment you clicked on
    $sql = "DELETE FROM appointments WHERE id = $id";

    if (mysqli_query($mysqli, $sql)) {
        mysqli_close($mysqli);
        header('Location: ../home.php');
        exit;
    } else {
        echo "Error deleting record";
    }


?>