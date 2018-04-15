<?php
session_start();
require_once("db.php");

    //if user clicked register button
if (isset($_POST)) {
        //Escape special characters in string first
    $companyemail = mysqli_real_escape_string($conn, $_POST['companyemail']);
    $companypassword = mysqli_real_escape_string($conn, $_POST['companypassword']);

        //Encrypt company password
    $companypassword = base64_encode(strrev(md5($password)));

    $sql = "SELECT id_company, companyname, companyusername, companyemail FROM companies WHERE companyemail='$companyemail' AND companypassword='$companypassword'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //output data
        while ($row = $result->fetch_assoc()) {
            $_SESSION['companyname'] = $row['companyname'];
            $_SESSION['companyemail'] = $row['companyemail'];
            $_SESSION['id_company'] = $row['id_company'];
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