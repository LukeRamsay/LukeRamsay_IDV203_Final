<?php 
    if(!empty($_POST)){
        $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');
    
        if($mysqli->connect_error){
            die("Connection Error: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
        }

        $Patname = $_POST['pat-name'];
    
        $PatCheckQuery = "SELECT * FROM patients WHERE name = '.$Patname.'";
        $PatResult = mysqli_query($mysqli, $PatCheckQuery);
        
        //error (Might be With the mysqli->real_escape_string($_POST) things not being reset)
        //Same problem as doctors
        if(mysqli_num_rows($PatResult) > 0){
        $message = 'That Patient Already Exists';
        header("location:../home.php");
        
        } else {
    
        $sql = "INSERT INTO patients(name, email, phone, medical) VALUES(
            '{$mysqli->real_escape_string($_POST['pat-name'])}',
            '{$mysqli->real_escape_string($_POST['pat-mail'])}',
            '{$mysqli->real_escape_string($_POST['pat-phone'])}',
            '{$mysqli->real_escape_string($_POST['pat-med'])}'
            )";
    
        $insert = $mysqli->query($sql);
    
        if($insert){
            echo 'Success {$mysqli->insert_id}';
        } else {
            die("Error: {$mysqli->errno} : {$mysqli->error}");
        }
    
        $mysqli->close();
    
        header("location:../home.php");
    }
    }  
?>