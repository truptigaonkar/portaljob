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

    <div class="row">
      <div class="col-md-12">
        <div>
            <a href="dashboard.php" class="btn btn-primary btn-sm" >Back</a>
        </div>
        <div class="card card-info">
          <div class="card-header text-center"><h4>Applied Jobs from Candidate</h4>       
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
                  <th>Created At</th>           
                  </tr>
                </thead>                                 
                <tbody>
                  <?php 
                  $sql = "SELECT * FROM jobposts INNER JOIN applyjobpost ON jobposts.id_jobpost=applyjobpost.id_jobpost WHERE applyjobpost.id_user='$_SESSION[id_user]' ";
                  $result = $conn->query($sql);
                  //If Job Post exists then display details of post
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      ?> 
                      <tr> 
                  <td><?php echo $row["jobtitle"]; ?></td>             
                  <td><?php echo substr($row["jobdescription"], 0, 50); ?></td>
                  <td><?php echo $row["jobsalary"]; ?></td>
                  <td><?php echo $row["jobexperience"]; ?></td>
                  <td><?php echo $row["jobqualification"]; ?></td>
                  <td><?php echo date("d-M-Y", strtotime($row["jobcreatedat"])); ?></td>
                 
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

