<?php
session_start();
require_once("db.php");

    //if user clicked register button
if (isset($_POST)) {

    // To get $id_company    
    $sql = "SELECT * FROM jobposts WHERE id_jobpost='$_GET[id]' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_company = $row['id_company'];
    }

    $sql = "INSERT INTO applyjobpost(id_jobpost, id_company, id_user) VALUES('$_GET[id]', '$id_company', '$_SESSION[id_user]')";
    if ($conn->query($sql) === true) {
        $_SESSION['jobapplySuccess'] = true;
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