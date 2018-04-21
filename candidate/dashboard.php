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
  <br>
<!-- If User have successfully updated profile then show them this success message -->
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

<!-- If User have successfully apply job then show them this success message -->
<?php 
if (isset($_SESSION['jobapplySuccess'])) {
  ?>
    <div class="alert alert-success">
    <p class="text-center">Your have applied job Successfully!!!!</p>
    </div>
  <?php
  unset($_SESSION['jobapplySuccess']);
}
?>

    <div class="row">
      <div class="col-md-12">
      <div>
        <a href="appliedjobpost.php" class="btn btn-primary btn-lg" >Applied Jobs</a>
      </div>
        <div class="card card-info">
          <div class="card-header text-center"><h4>All Job Post - Active Jobs</h4>       
          </div>
            <div class="card-body">
            <table class="table table-striped table-bordered table-hover">
                <thead> 
                <tr> 
                  <th>Title</th>
                  <th>Description</th>
                  <th>Salary</th>
                  <th>Experience</th>
                  <th>Qualification</th>
                  <th>CreatedAt</th>           
                  <th>Action</th>
                  </tr>
                </thead>                                 
                <tbody>
                  <?php 
                  $sql = "SELECT * FROM jobposts";
                  $result = $conn->query($sql);
                  //If Job Post exists then display details of post
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      $sql1 = "SELECT * FROM applyjobpost WHERE id_user='$_SESSION[id_user]' AND id_jobpost='$row[id_jobpost]' ";
                      $result1 = $conn->query($sql1);
                      ?> 
                      <tr> 
                  <td><?php echo $row["jobtitle"]; ?></td>                  
                  <td><?php echo substr($row["jobdescription"], 0, 50); ?></td>
                  <td><?php echo $row["jobsalary"]; ?></td>
                  <td><?php echo $row["jobexperience"]; ?></td>
                  <td><?php echo $row["jobqualification"]; ?></td>
                  <td><?php echo date("d-M-Y", strtotime($row["jobcreatedat"])); ?></td>
                  <?php
                  if ($result1->num_rows > 0) {
                    ?>
                     <td><strong>Applied</strong></td>
                     <?php

                  } else {
                    ?>
                  <td>    
                    <a href="applyjobpost.php?id=<?php echo $row["id_jobpost"]; ?>" class="btn btn-primary btn-sm" >Apply</a>
                  </td>
                   <?php 
                } ?>
                  </tr> 
                <?php

              }
            }
            $conn->close();
            ?>

                </tbody>                                                     
              </table> 
            </div>
          </div>
        </div>
      </div>     
    </div>
</section>

<?php include "includes/footer.php"; ?>

