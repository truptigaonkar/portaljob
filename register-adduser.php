<?php
    session_start();
    require_once("db.php");

    //if user clicked register button
    if(isset($_POST)){
        //Escape special characters in string first
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        //Encrypt password
        $password = base64_encode(strrev(md5($password)));

        $sql = "SELECT email FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        if($result->num_rows == 0){
            $sql = "INSERT INTO users(name, username, email, password) VALUES('$name', '$username', '$email', '$password')";
            if($conn->query($sql)===TRUE){
                $_SESSION['registerCompleted'] = true;
                header("Location: login.php");
                exit();
            } else {
                echo "Error " . $sql . "<br>" . $conn->error;
            }
        } else {
            $_SESSION['registerError'] = true;
            header("Location: register.php");
            exit();
        }

        $conn->close();

    }else{
        header("Location: register.php");
        exit();
    }
?>