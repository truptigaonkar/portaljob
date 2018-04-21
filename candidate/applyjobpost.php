<?php
session_start();
if (empty($_SESSION['id_user'])) {
    header("Location: ../index.php");
}
require_once("db.php");
include "includes/head.php";
include "includes/header.php";
?>

<section>
  <div class="container">
  <hr>
  <div class="row">
      <div class="col-md-12">
      <div class="card card-info">
<?php 
$sql = "SELECT * FROM jobposts WHERE id_jobpost='$_GET[id]' ";
$result = $conn->query($sql);

//If Job Post exists then display details of post
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="card-header text-center"><h4><?php echo $row["jobtitle"]; ?></h4></div>
        <div class="body">
            <p><?php echo $row["jobdescription"]; ?></p>
        </div>
        <td>    
            <a href="applyjobpost-apply.php?id=<?php echo $row["id_jobpost"]; ?>" class="btn btn-primary btn-sm" >Apply</a>
        </td>

<?php

}
}
$conn->close();
?>

      </div>
  </div>
  

</div>
      
    </div>
</section>

<?php include "includes/footer.php"; ?>

