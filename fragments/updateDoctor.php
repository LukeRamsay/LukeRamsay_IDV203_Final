<?php 

//move the uploaded file into my directory
if(!empty($_FILES['doc-picture']))
{
    $path ="../img/";
    $path = $path . basename($_FILES['doc-picture']['name']);
    if(move_uploaded_file($_FILES['doc-picture']['tmp_name'],$path)){
        echo "The file " . basename($_FILES['doc-picture']['name']) . " has been uploaded";
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

    //Setting default image
    if($_FILES['doc-picture']["error"] == 4) {
        $docImg = "default-profile.png";   
    } else {
        $docImg = $_FILES['doc-picture']['name'];
    }

    $id = $_GET['id'];
    $docName = $_POST['doc-name'];
    $docSpec = $_POST['doc-spec'];
    $docRoom = $_POST['doc-room'];
    $docPhone = $_POST['doc-phone'];

    $sql = "UPDATE doctors SET name = '$docName', speciality = '$docSpec', room = '$docRoom', phone = '$docPhone', profileimg = '$docImg' WHERE id = $id";
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