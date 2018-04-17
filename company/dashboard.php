<?php
session_start();
if (empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
}
require_once("db.php");
include "includes/head.php";
include "includes/header.php";
?>

<section>
  <div class="container">
  <hr>
<!-- If User have successfully updated profile then show them this success message -->
<?php 
if (isset($_SESSION['profileUpdated'])) {
  ?>
    <div class="alert alert-success">
    <p class="text-center">Your Company Profile Has Been Updated Successfully!!!!</p>
    </div>
  <?php
  unset($_SESSION['profileUpdated']);
}
?>
<!-- Job Post Creation Success -->
<?php 
if (isset($_SESSION['jobpostSuccess'])) {
  ?>
    <div class="alert alert-success">
    <p class="text-center">Added Job Post Successfully!!!!</p>
    </div>
  <?php
  unset($_SESSION['jobpostSuccess']);
}
?>


    <div class="row">
      <div class="col-md-12">
        <div class="card card-info">
          <div class="card-header"><h4>Job Post <small>Add, View, Edit, Delete</small><a href="createjobpost.php" class="btn btn-primary btn-block btn-xs col-md-2 pull-right">Add Jobpost</a></h4>       
          </div>
            <div class="card-body">
            </div>
          </div>
        </div>
      </div>     
    </div>
</section>

<?php include "includes/footer.php"; ?>

