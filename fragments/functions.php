<?php
    //displaying the user image and name
    function showUser(){
        session_start();
        $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');
    
        if($mysqli->connect_error){
            die("Connection Eroor: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
        }
    
        if(isset($_SESSION["username"])){
            $profileName = $_SESSION['username'];
            $userProfileQuery = "SELECT * FROM users WHERE username = '$profileName' ";
            
            if($result = $mysqli->query($userProfileQuery)){
                while($row = $result->fetch_assoc()){
                    $profileID = $row['id'];
                    $profileImg = $row['userprofileimg'];
                    $name = $row['username'];
    
                    echo '<a href="fragments/editUser.php?id=' .$profileID. '"><img class="user-profile" src="img/' .$profileImg. '"> 
                        <div class="user-name"><h3> '.$name. ' </h3></div></a>';
                }
                $result->free();
            }
        }
    }
    //showing all the doctors
    function showDoctors(){
        $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');

        if($mysqli->connect_error){
            die("Connection Eroor: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
        }
        $patQuery = "SELECT * FROM doctors";

        if($result = $mysqli->query($patQuery)){
            while($row = $result->fetch_assoc()){
                $docID = $row['id'];
                $docName = $row['name'];
                $docSpec = $row['speciality'];
                $docRoom = $row['room'];
                $docImg = $row['profileimg'];

                echo '
                    <div class="doctor-container">
                        <img class="doctor-image" src="img/' .$docImg. '"
                        >
                        <div class="doctor-name">
                            <h3 style="margin-bottom: 0px;">' .$docName. ' ' .$docSpec. '</h3>
                        </div>
                        <div class="doctor-speciality">
                            <h3 style="margin-bottom: 0px; margin-top: 10px;">Room:' .$docRoom. '</h3>
                        </div>
                        <div class="doctor-speciality">
                        <a href="fragments/editDoctor.php?id=' .$docID. '"><h4 class="doctor-speciality" style="margin-right:10%; margin-top: 10px; width:20%; color:#F41344; margin-left:0px;">EDIT</h4></a>
                        <a href="fragments/DeleteDoctor.php?id=' .$docID. '"><h4 class="doctor-speciality" style="margin-right:2%; margin-top: 10px; width:20%; color:#F41344; margin-left:0px;">REMOVE</h4></a>
                        </div>
                    </div>
                ';

            }
            $result->free();
        }
    }
    //showing all the doctors as options for a select
    function doctorOptions(){
        $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');
    
            if($mysqli->connect_error){
                die("Connection Eror: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
            }
    
            $produceQuery = "SELECT * FROM doctors";
    
            if($result = $mysqli->query($produceQuery)){
                while($row = $result->fetch_assoc()){
                    $docName = $row['name'];
                    $docSpec = $row['speciality'];
    
                    echo '
                        <option>' .$docName. "-" . $docSpec. '</option>;
                    ';
    
                }
                $result->free();
            } 
    }
//showing all the patients as options for a select
    function patientOptions(){
        $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');
    
            if($mysqli->connect_error){
                die("Connection Eror: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
            }
    
            $produceQuery = "SELECT * FROM patients";
    
            if($result = $mysqli->query($produceQuery)){
                while($row = $result->fetch_assoc()){
                    $patName = $row['name'];
    
                    echo '
                        <option>' .$patName. '</option>;
                    ';
    
                }
                $result->free();
            } 
    }
//showing all the rooms as options for a select
    function roomOptions(){
        $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');
    
            if($mysqli->connect_error){
                die("Connection Eror: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
            }
    
            $produceQuery = "SELECT * FROM rooms";
    
            if($result = $mysqli->query($produceQuery)){
                while($row = $result->fetch_assoc()){
                    $roomName = $row['name'];
                    $floor = $row['floor'];
    
                    echo '
                        <option>' .$roomName. " " . $floor. " floor" . '</option>;
                    ';
    
                }
                $result->free();
            } 
    }
//showing all the times as options for a select
    function timeOptions(){
        $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');
    
            if($mysqli->connect_error){
                die("Connection Eror: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
            }
    
            $produceQuery = "SELECT * FROM timeSlots";
    
            if($result = $mysqli->query($produceQuery)){
                while($row = $result->fetch_assoc()){
                    $time = $row['time'];
    
                    echo '
                        <option>' .$time. '</option>;
                    ';
    
                }
                $result->free();
            } 
    }
//showing all the specialities as options for a select
    function SpecOptions(){
        $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');
    
            if($mysqli->connect_error){
                die("Connection Eror: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
            }
    
            $produceQuery = "SELECT * FROM speciality";
    
            if($result = $mysqli->query($produceQuery)){
                while($row = $result->fetch_assoc()){
                    $Spec = $row['name'];
    
                    echo '
                        <option>' .$Spec. '</option>;
                    ';
    
                }
                $result->free();
            } 
    }

//counting the number of doctors in the doctors table
function countDocs(){

    $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');

    if($mysqli->connect_error){
        die("Connection Eroor: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
    }

    $sql="SELECT * FROM doctors";

    if ($result=mysqli_query($mysqli,$sql))
    {
    $rowcount=mysqli_num_rows($result);
    printf($rowcount);
    mysqli_free_result($result);
    }

    mysqli_close($mysqli);
}
//counting the number of patients in the patients table
function countPats(){

    $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');

    if($mysqli->connect_error){
        die("Connection Eroor: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
    }

    $sql="SELECT * FROM patients";

    if ($result=mysqli_query($mysqli,$sql))
    {
    $rowcount=mysqli_num_rows($result);
    printf($rowcount);
    mysqli_free_result($result);
    }

    mysqli_close($mysqli);
}
//counting the number of appointments in the appointments table
function countApts(){

    $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');

    if($mysqli->connect_error){
        die("Connection Eroor: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
    }

    $sql="SELECT * FROM appointments";

    if ($result=mysqli_query($mysqli,$sql))
    {
    $rowcount=mysqli_num_rows($result);
    printf($rowcount);
    mysqli_free_result($result);
    }

    mysqli_close($mysqli);
}

?>