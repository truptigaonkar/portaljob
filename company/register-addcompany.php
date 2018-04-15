<?php
session_start();
require_once("db.php");

    //if user clicked register button
if (isset($_POST)) {
        //Escape special characters in string first
    $companyname = mysqli_real_escape_string($conn, $_POST['companyname']);
    $companyusername = mysqli_real_escape_string($conn, $_POST['companyusername']);
    $companyemail = mysqli_real_escape_string($conn, $_POST['companyemail']);
    $companypassword = mysqli_real_escape_string($conn, $_POST['companypassword']);

        //Encrypt password
    $companypassword = base64_encode(strrev(md5($password)));

    $sql = "SELECT companyemail FROM companies WHERE companyemail='$companyemail'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        $sql = "INSERT INTO companies(companyname, companyusername, companyemail, companypassword) VALUES('$companyname', '$companyusername', '$companyemail', '$companypassword')";
        if ($conn->query($sql) === true) {
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

} else {
    header("Location: register.php");
    exit();
}
?>