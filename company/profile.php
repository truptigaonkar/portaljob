<?php
session_start();
if (empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
}
include "includes/head.php";
include "includes/header.php";
require_once "db.php";
?>

<section>
<hr>
<div class="container">
    <div class="row justify-content-center">
<div class="col-md-6 col-md-offset-4">
<div class="card">
    
  <div class="card-header">Profile</div>
  <div class="card-body">
  <form method="post" action="profile-update.php">
      <!-- Register form success -->
      <?php 
      $sql = "SELECT * FROM companies WHERE id_company='$_SESSION[id_company]' ";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          ?>

      <div class="form-group has-feedback ">
        <input type="companyname" class="form-control" id="companyname" name="companyname" value="<?php echo $row['companyname']; ?>" placeholder="Company Name" required="">
      </div>
      <div class="form-group has-feedback">
        <input type="companyusername" class="form-control" id="companyusername" name="companyusername" value="<?php echo $row['companyusername']; ?>" placeholder="Company Username" required="">
      </div>
      <div class="form-group has-feedback">
        <input type="companyemail" class="form-control" id="companyemail" placeholder="Company Email" value="<?php echo $row['companyemail']; ?>" readonly>
      </div>
      <div class="form-group has-feedback">
        <textarea type="companyaddress" class="form-control" id="companyaddress" name="companyaddress" placeholder="Company Address" required=""><?php echo $row['companyaddress']; ?></textarea>
      </div>
      <div class="form-group has-feedback">
        <input type="companycountry" class="form-control" id="companycountry" name="companycountry" placeholder="Company Country" value="<?php echo $row['companycountry']; ?>" required="">
      </div>
      <div class="form-group has-feedback">
        <input type="companycontact" class="form-control" id="companycontact" name="companycontact" placeholder="Company Contact" value="<?php echo $row['companycontact']; ?>" required="">
      </div>
      <div class="form-group has-feedback">
        <input type="companytype" class="form-control" id="companytype" name="companytype" placeholder="Company Type" value="<?php echo $row['companytype']; ?>" required="">
      </div>
      <div class="form-group has-feedback">
        <button type="submit" class="btn btn-info btn-block btn-flat">Update Profile</button>
      </div>
      <?php 
    }
  }
  ?>

    </form>
  </div>
  </div>
</div>
</div>


    
</div>
</section>

<?php include "includes/footer.php"; ?>