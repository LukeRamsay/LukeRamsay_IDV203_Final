<?php
    //cant get the drop downs from functions.php to show in the echo
    //same as all the other edits
    function editApt(){
        $id = $_GET['id'];

        $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');

        if($mysqli->connect_error){
            die("Connection Eroor: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
        }

        $aptUpdate = "SELECT * FROM appointments WHERE id = $id";

        if($result = $mysqli->query($aptUpdate)){
            while($row = $result->fetch_assoc()){
            $id = $row['id'];
            $doc = $row['doctor'];
            $pat = $row['patient'];
            $room = $row['room'];
            $time = $row['time'];
            $date = $row['date'];

            echo '
            <div class="data-holder2 data-holder3" style="margin-top: 50px; margin-left:10%; height:820px;">
                <div id="signupform" class="register">
                    <h1>EDIT THE APPOINTMENT</h1>
                    <form enctype="multipart/form-data" method="post" action="updateAppointment.php?id=' .$id. '" id="sign-up" name="sign-up" autocomplete="off">
                        <h4>Select A Doctor</h4>
                        <input type="text" placeholder="Speciality" autocomplete="nope" name="selectDoctor" value="' .$doc. '" /><br>
                        <h4>Select Patient</h4>
                        <input type="text" placeholder="Speciality" autocomplete="nope" name="selectPatient" value="' .$pat. '" /><br>
                        <h4>Select A Room</h4>
                        <input type="text" placeholder="Speciality" autocomplete="nope" name="selectRoom" value="' .$room. '" /><br>
                        <h4>Select A Time</h4>
                        <input type="text" placeholder="Speciality" autocomplete="nope" name="selectTime" value="' .$time. '" /><br>
                        <h4>Select A Date</h4>
                        <input type="date" name="selectDate" value="'.$date.'">
                        <button type="submit" id="reg-btn">ADD</button>
                    </form>
                </div>
            </div>
            ';
            }
            $result->free();
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title></title>
        <link href="../css/work.css" rel="stylesheet">
    </head>
    <body>
        <?php editApt(); ?>
    </body>
    </html>