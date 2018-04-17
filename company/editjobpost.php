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
    
  <div class="card-header">Edit Job Post</div>
  <div class="card-body">
  <form method="post" action="editjobpost-updatejobpost.php">
  <!-- To update the form with old vaulues -->
  <?php 
    $sql = "SELECT * FROM jobposts WHERE id_jobpost='$_GET[id]' AND id_company='$_SESSION[id_company]' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

      <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Job Title</label>
        <div class="col-lg-9">
          <input type="jobtitle" class="form-control" id="jobtitle" name="jobtitle" placeholder="Job Title" value="<?php echo $row['jobtitle']; ?>" required="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">job description</label>
        <div class="col-lg-9">
          <textarea type="jobdescription" class="form-control" id="jobdescription" name="jobdescription" placeholder="jobdescription" required=""><?php echo $row['jobdescription']; ?></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">job salary</label>
        <div class="col-lg-9">
          <input type="jobsalary" class="form-control" id="jobsalary" name="jobsalary" placeholder="jobsalary" value="<?php echo $row['jobsalary']; ?>" required="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Job Experience</label>
        <div class="col-lg-9">
          <input type="Job Experience" class="form-control" id="jobexperience" name="jobexperience" value="<?php echo $row['jobexperience']; ?>" placeholder="jobexperience" required="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">job qualification</label>
        <div class="col-lg-9">
          <input type="jobqualification" class="form-control" id="jobqualification" name="jobqualification" value="<?php echo $row['jobqualification']; ?>" placeholder="job qualification" required="">
        </div>
      </div>
      <input type="hidden" name="target_id" value="<?php echo $_GET['id']; ?>">
      <div class="form-group has-feedback">
        <button type="submit" class="btn btn-info btn-block btn-flat">Update Job Post</button>
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