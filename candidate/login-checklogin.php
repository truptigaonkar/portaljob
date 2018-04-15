<?php
session_start();
require_once("db.php");

    //if user clicked register button
if (isset($_POST)) {
        //Escape special characters in string first
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

        //Encrypt password
    $password = base64_encode(strrev(md5($password)));

    $sql = "SELECT id_user, fullname, username, email FROM users WHERE email='$email' AND password='$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //output data
        while ($row = $result->fetch_assoc()) {
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['id_user'] = $row['id_user'];
            header("Location: dashboard.php");
            exit();
        }
    } else {
        $_SESSION['loginError'] = true;
        header("Location: login.php");
        exit();
    }

    $conn->close();

} else {
    header("Location: login.php");
    exit();
}
?>