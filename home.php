<?php include 'fragments/connection.php'; include 'fragments/functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Appointments</title>
    <link rel="stylesheet" href="css/work.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script src="js/main.js"></script>
</head>
<body>
    <div class="outer-container">
        <div class="ounter-nav">
            <div class="nav-container">
                <div class="user-container">
                        <?php showUser(); ?>
                        <!-- show the user name and user image -->
                </div>
                <!-- nav items -->
                <div class="patients-container">
                        <div class="icon-con pat-icon"></div>
                        <div class="navname-con">
                            <h4 id="patients">patients</h4>
                        </div>
                </div>
                <div class="doctors-container">
                        <div class="icon-con doc-icon"></div>
                        <div class="navname-con">
                            <h4 id="doctors">doctors</h4>
                        </div>
                </div>
                <div class="appointments-container">
                        <div class="icon-con apt-icon"></div>
                        <div class="navname-con">
                            <h4 id="appointments">appointments</h4>
                        </div>
                </div>
                <div class="doctors-container" style="margin-top: 39%">
                    <div class="icon-con"></div>
                    <div class="navname-con">
                        <h3>
                        <!-- killling the session and going back to login -->
                        <?php echo '<a href="fragments/logout.php">Sign Out</a>';
                        ?>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-container">
            <div class="content-spacer"></div>
            <div class="upper-container pat-data">
                <div class="data-holder" style="margin-right: 12.5%;">
                    <div class="icon-data doc-icon" style="background-size:20%;"></div>
                    <!-- display the number of doctors in the doctors table -->
                    <h1 class="data"><?php countDocs(); ?></h1>
                    <h3 class="data-2">Doctors Available</h3>
                </div>
                <div class="data-holder" style="margin-right: 12.5%;">
                    <div class="icon-data pat-icon" style="background-size:20%;"></div>
                    <!-- display the number of patients in the patients table -->
                    <h1 class="data"><?php countPats(); ?></h1>
                    <h3 class="data-2">Patients</h3>
                </div>
                <div class="data-holder">
                    <div class="icon-data apt-icon" style="background-size:20%;"></div>
                    <!-- display the number of appointments in the appointments table -->
                    <h1 class="data"><?php countApts(); ?></h1>
                    <h3 class="data-2">Appointments Made</h3>
                </div>
            </div>
            <!-- add patients block -->
            <div class="data-holder2 data-holder3 pat-data" style="margin-top: 50px; height: 500px;">
                <div id="signupform" class="register">
                    <h1>ADD A PATIENT</h1>
                    <form enctype="multipart/form-data" method="post" action="fragments/addPatient.php" id="sign-up" name="sign-up" autocomplete="off">
                        <input type="text" placeholder="Name" autocomplete="nope" name="pat-name" id="pat-name" pattern="[a-zA-Z ]+" title="please use letters only"/><br>
                        <input type="text" placeholder="Email" autocomplete="off" name="pat-mail" id="pat-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" type="email" title="please a valid email adress"/><br>
                        <input type="text" placeholder="Phone Number" autocomplete="nope" name="pat-phone" id="pat-phone" pattern="[0-9]+" title="please enter number only" maxlength="10" minlength="10" /><br>
                        <input type="text" placeholder="Medical Aid Number" autocomplete="nope" name="pat-med" id="pat-med" pattern="[0-9]+" title="please enter number only"/><br>
                        <button type="submit" id="pat-btn">ADD</button>
                    </form>
                </div>
            </div>
            <!-- search patients block -->
            <div class="data-holder2 data-holder5 data-holder6 pat-data" style="margin-left:5%; width:45%; margin-top:50px; padding:1%">
            <form id="signup" method="post" style="height:50px;" >
                <input class="text-input" type="text" placeholder="Medical Aid Number" autocomplete="nope" name="searchMed" pattern="[0-9]+" title="please enter number only"/>
                <button class="button-small" type="submit" id="btn" name="MedSearch">SEARCH</button>
                <button class="button-small" type="submit" id="btn" name="all">SHOW ALL</button>
            </form>
            </div>
            <!-- View patients block -->
            <div class="data-holder2 data-holder4 pat-data" style="margin-top: 20px; margin-left:5%; width:45%; overflow-y: scroll; height:400px">
                <h1>PATIENTS</h1>
                <!-- php page that echos the patients based on the search or all the patients-->
                <?php include 'fragments/patientsFilter.php'; ?>
            </div>
            <!-- view doctors block -->
            <div class="data-holder2 data-holder4 doc-data visible" style="margin-top: 100px; height:650px; overflow-y: scroll;" id="doc-data">
                <h1>DOCTORS</h1>
                <!-- function displaying all the doctors in the doctors table -->
                <?php showDoctors(); ?>
            </div>
            <!-- add doctor block -->
            <div class="data-holder2 data-holder3 doc-data visible" style="margin-top: 100px; height:650px;" id="doc-data">
                <div id="signupform" class="register">
                    <h1>ADD A DOCTOR</h1>
                    <form enctype="multipart/form-data" method="post" action="fragments/addDoctor.php" id="sign-up" name="sign-up" autocomplete="off">
                        <input type="text" placeholder="Name" id="doc-name" autocomplete="nope" name="doc-name" pattern="[a-zA-Z ]+" title="please use letters only" /><br>
                        <h4>Select Speciality</h4>
                        <select name="doc-spec">
                            <!-- function showing all the specialities in the specialities table as options -->
                            <?php SpecOptions(); ?>
                        </select>
                        <h4>Select A Room</h4>
                        <select name="doc-room">
                            <!-- function showing all the rooms in the room table as options -->
                            <?php roomOptions(); ?>
                        </select>
                        <input type="text" placeholder="Phone Number" id="doc-phone" autocomplete="nope" name="doc-phone" pattern="[0-9]+" title="please enter number only" maxlength="10" minlength="10" /><br>
                        <h4 style="color:#545454">Upload A Profile Picture</h4>
                        <input type="file" name="doc-picture">
                        
                        <button type="submit" id="doc-btn">ADD</button>
                    </form>
                </div>
            </div>
            <!-- add appointment block -->
            <div class="data-holder2 data-holder3 apt-data visible" style="margin-top: 100px; height:640px;">
                <div id="signupform" class="register">
                    <h1>CREATE AN APPOINTMENT</h1>
                    <form enctype="multipart/form-data" method="post" action="fragments/addAppointment.php" id="sign-up" name="sign-up" autocomplete="off">
                        <h4>Select Doctor</h4>
                        <select name="selectDoctor">
                            <!-- function showing all the doctors in the doctors table as options -->
                            <?php doctorOptions(); ?>
                        </select>
                        <h4>Select Patient</h4>
                        <select name="selectPatient">
                            <!-- function showing all the patients in the patients table as options -->
                            <?php patientOptions(); ?>
                        </select>
                        <h4>Select A Room</h4>
                        <select name="selectRoom">
                            <!-- function showing all the rooms in the room table as options -->
                            <?php roomOptions(); ?>
                        </select>
                        <h4>Select A Time</h4>
                        <select name="selectTime">
                            <!-- function showing all the time slots in the time table as options -->
                            <?php timeOptions(); ?>
                        </select>
                        <input type="date" name="selectDate" id="app-date">
                        
                        <button id="app-btn" type="submit">ADD</button>
                    </form>
                </div>
            </div>
            <!-- search appointments block -->
            <div class="data-holder2 data-holder5 apt-data visible" style="margin-left:5%; height: 140px; width:45%; padding:1%">
            <form method="post">
                <select name="selectDoctor" style="height:40px; width:250px; display:inline-block; margin-left:40px; margin-bottom:15px;">
                <!-- function showing all the doctors in the doctors table as options -->
                    <?php doctorOptions(); ?>
                </select>
                <button style="display:inline-block; " class="button-small" type="submit" name="doctors" id="btn">SEARCH</button>
                <button style="display:inline-block" class="button-small" type="submit" name="showall" id="btn">SHOW ALL</button>
                <select name="selectPatient" style="height:40px; width:250px; float:left; margin-left:40px;">
                    <!-- function showing all the patients in the patients table as options -->
                    <?php patientOptions(); ?>
                </select>
                <button style="display:inline-block" class="button-small" type="submit" name="patients" id="btn">SEARCH</button>
                <button style="display:inline-block" class="button-small" type="submit" name="showall" id="btn">SHOW ALL</button>
            </form>
        </div>
        <!-- show appointments block -->
            <div class="data-holder2 data-holder4 apt-data visible" style="margin-top: 20px; margin-left:5%; width:45%; overflow-y: scroll; height:520px;">
                <h1>APPOINTMENTS</h1>
                <!-- php page that echos the appointments based on the search -->
                <?php include 'fragments/appointmentsFilter.php'; ?>
            </div>
            </div>
        </div>    
    </div>
</body>
</html>