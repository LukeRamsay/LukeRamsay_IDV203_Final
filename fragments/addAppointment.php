<?php 

if(!empty($_POST)){
    
    $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');
    
    if($mysqli->connect_error){
        die("Connection Error: " . $mysqli->connect_errno . ':' . $mysqli->connec_error);
    }

    //saving values from the post to variables
    $doc = $_POST['selectDoctor'];
    $pat = $_POST['selectPatient'];
    $room = $_POST['selectRoom'];
    $time = $_POST['selectTime'];
    $date = $_POST['selectDate'];

    //Three ways to double book
    //Booking the same Doctor twice at the same time
    //Booking the same room twice at the same time
    //Booking the same patient twice at the same time
    
    //Finding all appointments rows where the doctor is already booked at the same time on the same date
    $AppointmentQuery = "SELECT * FROM appointments WHERE doctor = '.$doc.' AND time = '.$time.' AND date = '.$date.' ";
    $AppResult = mysqli_query($mysqli, $AppointmentQuery);

    //Finding all appointments rows where the room is already booked at the same time on the same date
    $AppointmentQuery2 = "SELECT * FROM appointments WHERE room = '.$room.' AND time = '.$time.' AND date = '.$date.' ";
    $AppResult2 = mysqli_query($mysqli, $AppointmentQuery2);

    //Finding all appointments rows where the patient has already booked at the same time on the same date
    $AppointmentQuery3 = "SELECT * FROM appointments WHERE patient = '.$pat.' AND time = '.$time.' AND date = '.$date.' ";
    $AppResult3 = mysqli_query($mysqli, $AppointmentQuery3);
    
    //First Query Check
    if(mysqli_num_rows($AppResult) > 0){
        echo 'alert(That Doctor is already booked at that time)';
        sleep(3);
        header("location:../home.php");
        
    } //Second Query Check
    else if (mysqli_num_rows($AppResult2) > 0){
        echo 'That Room is already booked at that time';
        header("location:../home.php");

    } //Third Query Check 
    else if (mysqli_num_rows($AppResult3) > 0){
        echo 'That Patient is already booked at that time';
        header("location:../home.php");
    } //else (if evertyhting is fine)
    else { 

    $sql = "INSERT INTO appointments (doctor, patient, room, time, date) VALUES(
    '{$mysqli->real_escape_string($_POST['selectDoctor'])}',
    '{$mysqli->real_escape_string($_POST['selectPatient'])}',
    '{$mysqli->real_escape_string($_POST['selectRoom'])}',
    '{$mysqli->real_escape_string($_POST['selectTime'])}',
    '{$mysqli->real_escape_string($_POST['selectDate'])}'
    )";
    
    $insert = $mysqli->query($sql);
    
    if($insert){
        echo 'Success {$mysqli->insert_id}'; 
    }else{
        die("Error: {$mysqli->errno} : {$mysqli->error}");
    }
    
    $mysqli->close();
    
    header("location:../home.php");
}
}
    
?>
