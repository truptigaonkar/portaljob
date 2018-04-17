<?php
session_start();
if (empty($_SESSION['id_user'])) {
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
    
  <div class="card-header">Profile</div>
  <div class="card-body">
  <form method="post" action="profile-update.php">
      <!-- Register form success -->
      <?php 
      $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]' ";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          ?>
      <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Candidate Fullname</label>
        <div class="col-lg-9">
          <input type="fullname" class="form-control" id="fullname" name="fullname" value="<?php echo $row['fullname']; ?>" placeholder="Candidate Fullname" required="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Candidate Username</label>
        <div class="col-lg-9">
          <input type="username" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" placeholder="Candidate Username" required="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Candidate Email</label>
        <div class="col-lg-9">
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Candidate Email" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Candidate Address</label>
        <div class="col-lg-9">
          <textarea type="address" class="form-control" id="address" name="address" placeholder="Candidate Address" required=""><?php echo $row['address']; ?></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Candidate Country</label>
        <div class="col-lg-9">
          <input type="country" class="form-control" id="country" name="country" value="<?php echo $row['country']; ?>" placeholder="Candidate Country" required="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Candidate Contact</label>
        <div class="col-lg-9">
          <input type="contact" class="form-control" id="contact" name="contact" value="<?php echo $row['contact']; ?>" placeholder="Candidate Contact" required="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Candidate Qualification</label>
        <div class="col-lg-9">
          <input type="qualification" class="form-control" id="qualification" name="qualification" value="<?php echo $row['qualification']; ?>" placeholder="Candidate Qualification" required="">
        </div>
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