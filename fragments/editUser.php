<?php 
    function editUser(){
        //All same as the edit doctor function
        $id = $_GET['id'];

        $mysqli = new mysqli('localhost', 'root', 'root', 'sanitarium');

        if($mysqli->connect_error){
            die("Connection Error: " . $mysqli->connect_errno . ':' . $mysqli->connect_error);
        }

        $UserUpdate = "SELECT * FROM users WHERE id = $id";

        if($result = $mysqli->query($UserUpdate)){
            while($row = $result->fetch_assoc()){
                $UserID = $row['id'];
                $UserName = $row['username'];
                $Pass = $row['password'];
                $UserImg = $row['userprofileimg'];
                $email = $row['email'];

                echo '
                <div class="data-holder2 data-holder3" style="margin-top: 50px; margin-left: 20%; height:840px; padding-left:5%; margin-bottom:10%;">
                <div id="signupform" class="register">
                    <h1>UPDATE YOUR PROFILE</h1>
                    <img class="img-block" src="../img/'.$UserImg.'">
                    <form enctype="multipart/form-data" method="post" action="updateUser.php?id=' .$UserID. '" id="sign-up" name="sign-up" autocomplete="off">
                        <input type="text" placeholder="Name" autocomplete="nope" name="reg-name" pattern="[a-zA-Z ]+" title="please use letters only" value="' .$UserName. '"/><br>
                        <input type="password" placeholder="Password" autocomplete="nope" name="reg-password" value="'.$Pass. '" /><br>
                        <input type="text" placeholder="Email" autocomplete="nope" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" type="email" title="please a valid email adress" name="reg-email" value="' .$email. '"/><br>
                        <h4 style="color:#545454">Upload A Profile Picture</h4>
                        <input type="file" name="user-profile">
                        <button type="submit" id="reg-btn">UPDATE</button>
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
        <?php editUser(); ?>
    </body>
    </html>