<?php 

$mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');

//Search Based On the doctors Dropdown
if(isset($_POST['doctors'])){

    $doctorToSearch = $_POST['selectDoctor'];
    $query = "SELECT * FROM appointments WHERE CONCAT(doctor) LIKE '%" .$doctorToSearch."%'";
    $search_result = filterTable($query);

    if($result = $mysqli->query($query)){
        while($row = $result->fetch_assoc()){
            $id = $row['id'];
            $doc = $row['doctor'];
            $pat = $row['patient'];
            $room = $row['room'];
            $time = $row['time'];
            $date = $row['date'];

            echo '
            <div class="doctor-container" style="height:140px">
            <div class="doctor-name" style="width:80%">
                <h4 style="margin-bottom: 0px;">' .$doc. ' And ' .$pat. '</h4>
            </div>
            <div class="doctor-name">
                <h4 style="margin-bottom: 0px; margin-top: 10px;">Room - ' .$room. ' At - ' .$time. '</h4>
            </div>
            <div class="doctor-name">
                <h4 style="margin-bottom: 0px; margin-top: 10px;">Date - ' .$date. '</h4>
            </div> 
            <div class="doctor-speciality">
            <a href="fragments/editAppointment.php?id=' .$id. '"><h4 class="doctor-speciality" style="margin-right:10%; margin-top: 10px; width:20%; color:#F41344; margin-left:0px;">EDIT</h4></a>
            <a href="fragments/DeleteAppointment.php?id=' .$id. '"><h4 class="doctor-speciality" style="margin-right:2%; margin-top: 10px; width:20%; color:#F41344; margin-left:0px;">REMOVE</h4></a>
            </div>
            </div>
            ';
        }
    }

} //search based on the patients drop down
else if(isset($_POST['patients'])){

    $patientToSearch = $_POST['selectPatient'];
    $query = "SELECT * FROM appointments WHERE CONCAT(patient) LIKE '%" .$patientToSearch."%'";
    $search_result = filterTable($query);

    if($result = $mysqli->query($query)){
        while($row = $result->fetch_assoc()){
            $id = $row['id'];
            $doc = $row['doctor'];
            $pat = $row['patient'];
            $room = $row['room'];
            $time = $row['time'];
            $date = $row['date'];

            echo '
            <div class="doctor-container" style="height:140px">
            <div class="doctor-name" style="width:80%">
                <h4 style="margin-bottom: 0px;">' .$doc. ' And ' .$pat. '</h4>
            </div>
            <div class="doctor-name">
                <h4 style="margin-bottom: 0px; margin-top: 10px;">Room - ' .$room. ' At - ' .$time. '</h4>
            </div>
            <div class="doctor-name">
                <h4 style="margin-bottom: 0px; margin-top: 10px;">Date - ' .$date. '</h4>
            </div> 
            <div class="doctor-speciality">
            <a href="fragments/editAppointment.php?id=' .$id. '"><h4 class="doctor-speciality" style="margin-right:10%; margin-top: 10px; width:20%; color:#F41344; margin-left:0px;">EDIT</h4></a>
            <a href="fragments/DeleteAppointment.php?id=' .$id. '"><h4 class="doctor-speciality" style="margin-right:2%; margin-top: 10px; width:20%; color:#F41344; margin-left:0px;">REMOVE</h4></a>
            </div>
            </div>
            ';
        }
    }

} //Show all the appointments
 else {

    $query = "SELECT * FROM appointments";

    if($result = $mysqli->query($query)){
        while($row = $result->fetch_assoc()){
            $id = $row['id'];
            $doc = $row['doctor'];
            $pat = $row['patient'];
            $room = $row['room'];
            $time = $row['time'];
            $date = $row['date'];

            echo '
            <div class="doctor-container" style="height:140px">
            <div class="doctor-name" style="width:80%">
                <h4 style="margin-bottom: 0px;">' .$doc. ' And ' .$pat. '</h4>
            </div>
            <div class="doctor-name">
                <h4 style="margin-bottom: 0px; margin-top: 10px;">Room - ' .$room. ' At - ' .$time. '</h4>
            </div>
            <div class="doctor-name">
                <h4 style="margin-bottom: 0px; margin-top: 10px;">Date - ' .$date. '</h4>
            </div> 
            <div class="doctor-speciality">
            <a href="fragments/editAppointment.php?id=' .$id. '"><h4 class="doctor-speciality" style="margin-right:10%; margin-top: 10px; width:20%; color:#F41344; margin-left:0px;">EDIT</h4></a>
            <a href="fragments/DeleteAppointment.php?id=' .$id. '"><h4 class="doctor-speciality" style="margin-right:2%; margin-top: 10px; width:20%; color:#F41344; margin-left:0px;">REMOVE</h4></a>
            </div>
            </div>
            ';
        }
    }
}

?>