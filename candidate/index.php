<?php 
include "includes/head.php";
include "includes/header.php";
require_once("db.php");
?>

<!-- Header -->
<header class="masthead bg-primary text-white text-center">
      <div class="container">
        <h1 class="text-uppercase mb-0">All JOBS In One Place</h1>
        <h2 class="font-weight-light mb-0">One Search, Global Reach</h2>
      </div>
    </header>
<br>
   <h2 class="text-center text-uppercase text-secondary mb-0">Latest Job Posts</h2>
        <hr class="star-dark mb-5">
<?php 
$sql = "SELECT * FROM jobposts ORDER BY Rand() Limit 4";
$result = $conn->query($sql);

//If Job Post exists then display details of post
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    ?>
    <div class="card card-block bg-faded">
      <h4><?php echo $row['jobtitle']; ?></h4>
      <p><?php echo $row['jobdescription']; ?></p>        
  <?php

}
}
?>
</div>   
    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="portfolio">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Company</h2>
        <hr class="star-dark mb-5">
        <div class="row">
        <div class="col-md-12">
   
<?php 
$sql = "SELECT * FROM companies ORDER BY Rand() Limit 4";
$result = $conn->query($sql);

//If Job Post exists then display details of post
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    ?>
    <div class="card card-block bg-faded">
      <h4><?php echo $row['companyname']; ?></h4>
      <p><?php echo $row['companyaddress']; ?></p>        
  <?php

}
}
?>
</div>   
  </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section class="bg-primary text-white mb-0" id="about">
      <div class="container">
        <h2 class="text-center text-uppercase text-white">About</h2>
        <hr class="star-light mb-5">
        <div class="row">
          <div class="col-lg-4 ml-auto">
            <p class="lead">Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional LESS stylesheets for easy customization.</p>
          </div>
          <div class="col-lg-4 mr-auto">
            <p class="lead">Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
          </div>
        </div>
        <div class="text-center mt-4">
          <a class="btn btn-xl btn-outline-light" href="#">
            <i class="fa fa-download mr-2"></i>
            Download Now!
          </a>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Contact Me</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <form name="sentMessage" id="contactForm" novalidate="novalidate">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Name</label>
                  <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Email Address</label>
                  <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Phone Number</label>
                  <input class="form-control" id="phone" type="tel" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Message</label>
                  <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

<?php include "includes/footer.php"; ?>
