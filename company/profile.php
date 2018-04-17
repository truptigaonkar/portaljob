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
<div class="col-md-8 col-md-offset-4">
<div class="card">
    
  <div class="card-header">Company Profile</div>
  <div class="card-body">
  <form method="post" action="profile-update.php">
      <!-- To update the form with old vaulues -->
      <?php 
      $sql = "SELECT * FROM companies WHERE id_company='$_SESSION[id_company]' ";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          ?>

      <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Company Name</label>
        <div class="col-lg-9">
          <input type="companyname" class="form-control" id="companyname" name="companyname" value="<?php echo $row['companyname']; ?>" placeholder="Company Name" required="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Company Username</label>
        <div class="col-lg-9">
          <input type="companyusername" class="form-control" id="companyusername" name="companyusername" value="<?php echo $row['companyusername']; ?>" placeholder="Company Username" required="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Company Email</label>
        <div class="col-lg-9">
          <input type="companyemail" class="form-control" id="companyemail" name="companyemail" value="<?php echo $row['companyemail']; ?>" placeholder="Company Email" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Company Address</label>
        <div class="col-lg-9">
          <textarea type="companyaddress" class="form-control" id="companyaddress" name="companyaddress" placeholder="Company Address" required=""><?php echo $row['companyaddress']; ?></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Company Country</label>
        <div class="col-lg-9">
          <input type="companycountry" class="form-control" id="companycountry" name="companycountry" value="<?php echo $row['companycountry']; ?>" placeholder="Company Country" required="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Company Contact</label>
        <div class="col-lg-9">
          <input type="companycontact" class="form-control" id="companycontact" name="companycontact" value="<?php echo $row['companycontact']; ?>" placeholder="Company Contact" required="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Company Type</label>
        <div class="col-lg-9">
          <input type="companytype" class="form-control" id="companytype" name="companytype" value="<?php echo $row['companytype']; ?>" placeholder="Company Type" required="">
        </div>
      </div>
      <div class="form-group has-feedback">
        <button type="submit" class="btn btn-info btn-block btn-flat">Update Company Profile</button>
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