<?php 

    session_start();
    $host = "localhost";
    $username = "root";
    $password = "root";
    $database = "sanitarium";
    $messsage = "";

    try{
        $connect =  new PDO("mysql:host=$host; dbname=$database", $username, $password);

        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(isset($_POST['login'])){
            //Validate if all fields are filled in
            if(empty($_POST['username']) || empty($_POST['password'])){
                $messsage = '<label>All Fields are required for login</label>';
            } else {
                //Find any rows where username and password equal the entered ones
                $query = 'SELECT * FROM users WHERE username = :username AND password = :password';
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                        'username' => $_POST["username"],
                        'password' => $_POST["password"]
                    )
                );

                //Verify the entered username and password
                $count = $statement->rowCount();
                if($count > 0){
                    $_SESSION["username"] = $_POST["username"];
                    header("location:home.php");
                } else {
                    $messsage = '<label>Username Or Password Incorrect</label>';
                }
            }
        }
    }
    
    catch(PDOException $error){
        $messsage = $error->getMessage();
    }

?>