<?php include 'fragments/connection.php' ?>

<html>
    <head>
        <link href="css/main.css" rel="stylesheet"/>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
        <script src="js/main.js"></script> 
    </head>
    <body>
        <div id="box">
            <div id="main"></div>
            <!-- form for loggin in , used with connection to validate user input -->
            <div id="loginform" class="login">
                <h1>LOGIN</h1>
                <form autocomplete="off" method="post" id="log-in" name="log-in">
                <input type="username" placeholder="Username" autocomplete="off" name="username" id="log-user"/><br>
                <input type="password" placeholder="Password" autocomplete="off" name="password" id="log-pass"/><br>
                <button type="submit" name="login" id="log-btn">LOGIN</button>
                </form>
            </div>
            <!-- form for creating a new user -->
            <div id="signupform" class="register">
                <h1>SIGN UP</h1>
                <form enctype="multipart/form-data" method="post" action="fragments/addUser.php" id="sign-up" name="sign-up">
                <input type="username" placeholder="Username" autocomplete="off" name="reg-username" id="reg-user"/><br>
                <input type="password" placeholder="Password" autocomplete="off" name="reg-password" id="reg-pass"/><br>
                <h4 style="color:#545454">Upload A Profile Picture</h4>   
                <input type="file" name="user-profile" id="file" id="reg-img"/><br>
                <button type="submit" id="reg-btn">SIGN UP</button>
                </form>
            </div>
            
            <div id="login_msg">Have an account?</div>
            <div id="signup_msg">Don't have an account?</div>
            
            <button id="login_btn">LOGIN</button>
            <button id="signup_btn">SIGN UP</button>
        </div>
        <!-- <h2> php echo tag for mesage</h2> -->
    </body>
</html>