<?php
session_start();
if (empty($_SESSION['id_user'])) {
    header("Location: ../index.php");
}
include "includes/head.php";
include "includes/header.php";
?>

 <section>
      <div class="container">
        <hr>
        <h2 class="font-weight-light mb-0">Candidate Dashbooard</h2>

            <!-- If User have successfully registered then show them this success message -->
    <?php 
    if (isset($_SESSION['profileUpdated'])) {
      ?>
        <div class="alert alert-success">
        <p class="text-center">Your Candidate Profile Has Been Updated Successfully!!!!</p>
        </div>
      <?php
      unset($_SESSION['profileUpdated']);
    }
    ?>
       
      </div>
    </section>

<?php include "includes/footer.php"; ?>

