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

    $sql = "UPDATE jobposts SET jobtitle='$jobtitle', jobdescription='$jobdescription', jobsalary='$jobsalary', jobexperience='$jobexperience', jobqualification='$jobqualification' WHERE id_jobpost='$_POST[target_id]' ";
    if ($conn->query($sql) === true) {
        $_SESSION['jobupdateSuccess'] = true;
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