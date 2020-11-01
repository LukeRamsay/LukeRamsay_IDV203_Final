<?php 

$mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');

//Filter patients based on the value of the input for medical aid number
if(isset($_POST['MedSearch'])){

    $MedToSearch = $_POST['searchMed'];
    $query = "SELECT * FROM patients WHERE CONCAT(medical) LIKE '%" .$MedToSearch."%'";
    $search_result = filterTable($query);

    if($result = $mysqli->query($query)){
        while($row = $result->fetch_assoc()){
            $patID = $row['id'];
            $patName = $row['name'];
            $patMail = $row['email'];
            $patPhone = $row['phone'];
            $patMed = $row['medical'];

            echo '
            <div class="doctor-container" style="height:160px">
            <div class="doctor-name">
                <h4 style="margin-bottom: 0px;">' .$patName. '</h4>
            </div>
            <div class="doctor-name">
                <h4 style="margin-bottom: 0px; margin-top: 10px;">Email: ' .$patMail. '</h4>
            </div>
            <div class="doctor-name">
                <h4 style="margin-bottom: 0px; margin-top: 10px;">Number: ' .$patPhone. '</h4>
            </div>
            <div class="doctor-name">
                <h4 style="margin-bottom: 0px; margin-top: 10px;">Medical Aid: ' .$patMed. '</h4>
            </div>  
            <div class="doctor-speciality">
            <a href="fragments/editPatient.php?id=' .$patID. '"><h4 class="doctor-speciality" style="margin-right:10%; margin-top: 10px; width:20%; color:#F41344; margin-left:0px;">EDIT</h4></a>
            <a href="fragments/DeletePatient.php?id=' .$patID. '"><h4 class="doctor-speciality" style="margin-right:2%; margin-top: 10px; width:20%; color:#F41344; margin-left:0px;">REMOVE</h4></a>
            </div>
            </div>
            ';

        }
        $result->free();
    }

}//Show all the patients 
else {

    $query = "SELECT * FROM patients";

        if($result = $mysqli->query($query)){
            while($row = $result->fetch_assoc()){
                $patID = $row['id'];
                $patName = $row['name'];
                $patMail = $row['email'];
                $patPhone = $row['phone'];
                $patMed = $row['medical'];

                echo '
                <div class="doctor-container" style="height:160px">
                <div class="doctor-name">
                    <h4 style="margin-bottom: 0px;">' .$patName. '</h4>
                </div>
                <div class="doctor-name">
                    <h4 style="margin-bottom: 0px; margin-top: 10px;">Email: ' .$patMail. '</h4>
                </div>
                <div class="doctor-name">
                    <h4 style="margin-bottom: 0px; margin-top: 10px;">Number: ' .$patPhone. '</h4>
                </div>
                <div class="doctor-name">
                    <h4 style="margin-bottom: 0px; margin-top: 10px;">Medical Aid: ' .$patMed. '</h4>
                </div>  
                <div class="doctor-speciality">
                <a href="fragments/editPatient.php?id=' .$patID. '"><h4 class="doctor-speciality" style="margin-right:10%; margin-top: 10px; width:20%; color:#F41344; margin-left:0px;">EDIT</h4></a>
                <a href="fragments/DeletePatient.php?id=' .$patID. '"><h4 class="doctor-speciality" style="margin-right:2%; margin-top: 10px; width:20%; color:#F41344; margin-left:0px;">REMOVE</h4></a>
                </div>
                </div>
                ';

            }
            $result->free();
        }
}

function filterTable($query){
    $connect = mysqli_connect("localhost", "root", "root", "sanitarium");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>