<?php 
// updating the sql row, if only instert it would only create a new row, not update the current one
// also navigate back to the home page 
    if(!empty($_POST)){
        $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');
    
        if($mysqli->connect_error){
            die("Connection Error: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
        }

        $id = $_GET['id'];
        $name = $_POST['pat-name'];
        $mail = $_POST['pat-mail']; 
        $phone = $_POST['pat-phone'];
        $medical = $_POST['pat-medical'];
    
        $sql = "UPDATE patients SET name = '$name', email = '$mail', phone = '$phone', medical = '$medical' WHERE id = $id";
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