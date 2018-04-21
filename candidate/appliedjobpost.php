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

    <div class="row">
      <div class="col-md-12">
        <div class="card card-info">
          <div class="card-header text-center"><h4>Applied Jobs from Candidate</h4>       
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
                 
                  <td><?php echo $row["jobdescription"]; ?></td>
                  <td><?php echo $row["jobsalary"]; ?></td>
                  <td><?php echo $row["jobexperience"]; ?></td>
                  <td><?php echo $row["jobqualification"]; ?></td>
                  <td><?php echo $row["jobcreatedat"]; ?></td>
                 
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

