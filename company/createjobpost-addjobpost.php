<?php
session_start();
require_once("db.php");

    //if user clicked register button
if (isset($_POST)) {
        //Escape special characters in string first
    $jobtitle = mysqli_real_escape_string($conn, $_POST['jobtitle']);
    $jobdescription = mysqli_real_escape_string($conn, $_POST['jobdescription']);
    $jobsalary = mysqli_real_escape_string($conn, $_POST['jobsalary']);
    $jobexperience = mysqli_real_escape_string($conn, $_POST['jobexperience']);
    $jobqualification = mysqli_real_escape_string($conn, $_POST['jobqualification']);

    $sql = "INSERT INTO jobposts(id_company, jobtitle, jobdescription, jobsalary, jobexperience, jobqualification) VALUES('$_SESSION[id_company]', '$jobtitle', '$jobdescription', '$jobsalary', '$jobexperience', '$jobqualification')";
    if ($conn->query($sql) === true) {
        $_SESSION['jobpostSuccess'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

} else {
    header("Location: dashboard.php");
    exit();
}
?>