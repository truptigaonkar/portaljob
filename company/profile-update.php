<?php
session_start();
require_once("db.php");

    //if user clicked update profile button
if (isset($_POST)) {
        //Escape special characters in string first
    $companyname = mysqli_real_escape_string($conn, $_POST['companyname']);
    $companyusername = mysqli_real_escape_string($conn, $_POST['companyusername']);
    $companyaddress = mysqli_real_escape_string($conn, $_POST['companyaddress']);
    $companycountry = mysqli_real_escape_string($conn, $_POST['companycountry']);
    $companycontact = mysqli_real_escape_string($conn, $_POST['companycontact']);
    $companytype = mysqli_real_escape_string($conn, $_POST['companytype']);

    //update query
    $sql = "UPDATE companies SET companyname='$companyname', companyusername='$companyusername', companyaddress='$companyaddress', companycountry='$companycountry', companycontact='$companycontact', companytype='$companytype' WHERE id_company='$_SESSION[id_company]'";

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