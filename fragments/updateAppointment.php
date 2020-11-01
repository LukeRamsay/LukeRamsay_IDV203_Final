<?php 
    //same as the update patients function
    if(!empty($_POST)){ 
        $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');
    
        if($mysqli->connect_error){
            die("Connection Error: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
        }

        $id = $_GET['id'];
        $doc = $_POST['selectDoctor'];
        $pat = $_POST['selectPatient']; 
        $room = $_POST['selectRoom'];
        $time = $_POST['selectTime'];
        $date = $_POST['selectDate'];
    
        $sql = "UPDATE appointments SET doctor = '$doc', patient = '$pat', room = '$room', time = '$time', date= '$date' WHERE id = $id";
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