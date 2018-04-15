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
<div class="col-md-6 col-md-offset-4">
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

      <div class="form-group has-feedback ">
        <input type="fullname" class="form-control" id="fullname" name="fullname" value="<?php echo $row['fullname']; ?>" placeholder="Fullname" required="">
      </div>
      <div class="form-group has-feedback">
        <input type="username" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" placeholder="Username" required="">
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" id="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
      </div>
      <div class="form-group has-feedback">
        <textarea type="address" class="form-control" id="address" name="address" placeholder="Address" required=""><?php echo $row['address']; ?></textarea>
      </div>
      <div class="form-group has-feedback">
        <input type="country" class="form-control" id="country" name="country" placeholder="Country" value="<?php echo $row['country']; ?>" required="">
      </div>
      <div class="form-group has-feedback">
        <input type="contact" class="form-control" id="contact" name="contact" placeholder="Contact" value="<?php echo $row['contact']; ?>" required="">
      </div>
      <div class="form-group has-feedback">
        <input type="qualification" class="form-control" id="qualification" name="qualification" placeholder="Qualification" value="<?php echo $row['qualification']; ?>" required="">
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