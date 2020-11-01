<?php 
    if(!empty($_POST) || !empty($_FILES['doc-picture'])){

        $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');
    
        if($mysqli->connect_error){
            die("Connection Error: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
        }

        //rerouting the image to save it in my directory
        $path = "../img/";
        $path = $path . basename( $_FILES['doc-picture']['name']);
        if(move_uploaded_file($_FILES['doc-picture']['tmp_name'], $path)) {
        } else{
        $message = '<label>Select A profile Image</label>';
        }

        //setting default profile if neccesary
        if($_FILES['doc-picture']["error"] == 4) {
            $docProfile = "default-profile.png";   
        } else {
            $docProfile = $_FILES['doc-picture']['name'];
        }
        
        //saving doctor name to a variable to use in the query
        $Docname = $_POST['doc-name'];
       
        //Query to see if the doctor name already exists
        $DocCheckQuery = "SELECT * FROM doctors WHERE name = '.$Docname.'";
        $DocResult = mysqli_query($mysqli, $DocCheckQuery);

        if(mysqli_num_rows($DocResult) > 0){
        $message = '<label>That Doctor Already Exists</label>';
        // Values from the form are never reset $mysqli->close(); might work
        //When a new doctor is made with result > 0 after result >= 0 then both the old and new values are inserted into the table
        //The data is kept even on refresh and hard refresh
        //If i can get docname and the values from the form to reset then i think this will work
        //Tried unset($GLOBALS['docname']);
        //tried die();
        //tried mysqli_free_result($DocResult);
    } else {
    
        $sql = "INSERT INTO doctors(name, speciality, room, phone, profileimg) VALUES(
            '{$mysqli->real_escape_string($_POST['doc-name'])}',
            '{$mysqli->real_escape_string($_POST['doc-spec'])}',
            '{$mysqli->real_escape_string($_POST['doc-room'])}',
            '{$mysqli->real_escape_string($_POST['doc-phone'])}',
            '{$docProfile}'
            )";
    
        $insert = $mysqli->query($sql);
    
        if($insert){
            echo 'Success {$mysqli->insert_id}';
        } else {
            die("Error: {$mysqli->errno} : {$mysqli->error}");
        }
    
        $mysqli->close();
    
        header("location: ../home.php");
        }
    }    
?>