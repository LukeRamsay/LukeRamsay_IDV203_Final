<?php 
    function editdoc(){
        //getting id from the doctor that we click to edit
        $id = $_GET['id'];

        $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');

        if($mysqli->connect_error){
            die("Connection Eroor: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
        }
        //finding all rows where id is equal to the id we got to display the information
        $patUpdate = "SELECT * FROM doctors WHERE id = $id";

        if($result = $mysqli->query($patUpdate)){
            while($row = $result->fetch_assoc()){
                $docID = $row['id'];
                $docName = $row['name'];
                $docSpec = $row['speciality'];
                $docRoom = $row['room'];
                $docPhone = $row['phone'];
                $docImg = $row['profileimg'];
                
                //dislpaying the information that mached the id
                echo '
                <div class="data-holder2 data-holder3" style="margin-top: 50px; margin-left: 20%; height:840px; padding-left:5%; margin-bottom:10%;">
                <div id="signupform" class="register">
                    <h1>UPDATE A DOCTOR</h1>
                    <img class="img-block" src="../img/'.$docImg.'">
                    <form enctype="multipart/form-data" method="post" action="updateDoctor.php?id=' .$docID. '" id="sign-up" name="sign-up" autocomplete="off">
                        <input type="text" placeholder="Name" autocomplete="nope" name="doc-name" pattern="[a-zA-Z ]+" title="please use letters only" value="' .$docName. '"/><br>
                        <input type="text" placeholder="Speciality" autocomplete="nope" name="doc-spec" value="' .$docSpec. '" /><br>
                        <input type="text" placeholder="Room Number" autocomplete="nope" name="doc-room" value="' .$docRoom. '"/><br>
                        <input type="text" placeholder="Phone Number" autocomplete="nope" name="doc-phone" pattern="[0-9]+" title="please enter number only" maxlength="10" minlength="10"  value="' .$docPhone. '"/><br>
                        <h4 style="color:#545454">Upload A Profile Picture</h4>
                        <input type="file" name="doc-picture">
                        <button type="submit">UPDATE</button>
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
        <?php editdoc(); ?>
    </body>
    </html>