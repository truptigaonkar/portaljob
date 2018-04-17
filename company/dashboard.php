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
<!-- Job Post Updation Success -->
<?php 
if (isset($_SESSION['jobupdateSuccess'])) {
  ?>
    <div class="alert alert-success">
    <p class="text-center">Updated Job Post Successfully!!!!</p>
    </div>
  <?php
  unset($_SESSION['jobupdateSuccess']);
}
?>
<!-- Job Post Deletion Success -->
<?php 
if (isset($_SESSION['jobdeleteSuccess'])) {
  ?>
    <div class="alert alert-success">
    <p class="text-center">Deleted Job Post Successfully!!!!</p>
    </div>
  <?php
  unset($_SESSION['jobdeleteSuccess']);
}
?>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-info">
          <div class="card-header"><h4>Job Post <small>Add, View, Edit, Delete</small><a href="createjobpost.php" class="btn btn-primary btn-block btn-xs col-md-2 pull-right">Add Jobpost</a></h4>       
          </div>
            <div class="card-body">
            <table class="table table-striped table-bordered table-hover">
                <thead> 
                <tr> 
                  <th>Job Title</th>
                  <th>Job Description</th>
                  <th>Job Salary</th>
                  <th>Job Experience</th>
                  <th>Job Qualification</th>
                  <th>Job Created At</th>           
                  <th>Action</th>
                  </tr>
                </thead>                                 
                <tbody>
                  <?php 
                  $sql = "SELECT * FROM jobposts WHERE id_company='$_SESSION[id_company]' ";
                  $result = $conn->query($sql);

                //If Job Post exists then display details of post
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      ?> 
                      <tr> 
                  <td><?php echo $row["jobtitle"]; ?></td>
                  <td><?php echo $row["jobdescription"]; ?></td>
                  <td><?php echo $row["jobsalary"]; ?></td>
                  <td><?php echo $row["jobexperience"]; ?></td>
                  <td><?php echo $row["jobqualification"]; ?></td>
                  <td><?php echo $row["jobcreatedat"]; ?></td>
                  <td>    
                    <a href="editjobpost.php?id=<?php echo $row["id_jobpost"]; ?>" onclick="return confirm('Are you sure to Edit Jobpost !'); " class="btn btn-primary" >Edit</a>
                    <a href="deletejobpost.php?id=<?php echo $row["id_jobpost"]; ?>" onclick="return confirm('Are you sure to Delete Jobpost !'); " class="btn btn-danger" >Delete</a>  
                  </td>
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

