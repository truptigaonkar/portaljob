<?php
session_start();
require_once("db.php");

    //if user clicked update profile button
if (isset($_POST)) {
        //Escape special characters in string first
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);

    //update query
    $sql = "UPDATE users SET fullname='$fullname', username='$username', address='$address', country='$country', contact='$contact', qualification='$qualification' WHERE id_user='$_SESSION[id_user]'";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        $_SESSION['profileUpdated'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error" . $sql . "<br>" . $conn->error;
    }

    $conn->close();

} else {
    header("Location: dashboard.php");
    exit();
}
?>