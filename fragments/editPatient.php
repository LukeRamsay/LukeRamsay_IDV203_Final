<?php 
    function editPat(){
        //All the same as the edit doctor funtion
        $id = $_GET['id'];

        $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');

        if($mysqli->connect_error){
            die("Connection Eroor: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
        }

        $patUpdate = "SELECT * FROM patients WHERE id = $id";

        if($result = $mysqli->query($patUpdate)){
            while($row = $result->fetch_assoc()){
                $patID = $row['id'];
                $patName = $row['name'];
                $patMail = $row['email'];
                $patPhone = $row['phone'];
                $patMed = $row['medical'];

                echo '
                    <div class="data-holder2" style="margin-top: 50px; height: 740px; margin-left:10%;">
                        <div id="signupform" class="register">
                        <h1>EDIT A PATIENT</h1>
                            <form enctype="multipart/form-data" method="post" id="sign-up" name="sign-up" autocomplete="off" action="updatePatient.php?id='.$patID.'">
                                <h4>Change Name</h4>
                                <input type="text" placeholder="Name" autocomplete="nope" name="pat-name" pattern="[a-zA-Z ]+" title="please use letters only" id="reg-user"value="'.$patName.'"/><br>
                                <h4>Change Email</h4>
                                <input type="text" placeholder="Email" autocomplete="off" name="pat-mail" id="reg-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" type="email" title="please a valid email adress" value="'.$patMail.'"/><br>
                                <h4>Change Phone</h4>
                                <input type="text" placeholder="Phone Number" autocomplete="nope" name="pat-phone" pattern="[0-9]+" title="please enter number only" maxlength="10" minlength="10" id="reg-phone"value="'.$patPhone.'"/><br>
                                <h4>Change Medical</h4>
                                <input type="text" placeholder="Medical Aid" autocomplete="nope" name="pat-medical" id="reg-medical" pattern="[0-9]+" title="please enter number only" value="'.$patMed.'"/><br>
                                <button type="submit" id="reg-btn">Update</button>
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
        <?php editPat(); ?>
    </body>
    </html>