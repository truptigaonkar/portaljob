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

    <div class="row">
      <div class="col-md-12">
        <div class="card card-info">
          <div class="card-header text-center"><h4>All Job Post - Active Jobs</h4>       
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
                  $sql = "SELECT * FROM jobposts";
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

