<?php
session_start();
require_once("db.php");

    //if user clicked button
if (isset($_POST)) {

    $sql = "DELETE FROM jobposts WHERE id_jobpost='$_GET[id]' AND id_company='$_SESSION[id_company]' ";
    if ($conn->query($sql) === true) {
        $_SESSION['jobdeleteSuccess'] = true;
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