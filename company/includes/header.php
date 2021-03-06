<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="dashboard.php">JobPortal<small>company</small></a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

          
          <div class="dropdown">
          <ul class="navbar-nav ml-auto">

            <?php 
            if (isset($_SESSION['id_company'])) {
              ?>

            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="dashboard.php">Dashboard</a>
            </li/>  
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION["companyname"]; ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="profile.php">Profile</a>
              <a class="dropdown-item" href="logout.php">Logout</a>  
            </div>
          </div>
            <?php

          } else { ?>
            ?>
            
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Company</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contact</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <div class="dropdown">
                <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Accounts
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <h4 class="dropdown-header">Company</h4>
                  <a class="dropdown-item" href="register.php">Sign Up</a>     
                  <a class="dropdown-item" href="login.php">Sign In</a>               
                  <h4 class="dropdown-header">Candidate</h4>
                  <a class="dropdown-item" href="../candidate/register.php">Sign Up</a>     
                  <a class="dropdown-item" href="../candidate/login.php">Sign In</a>
                </div>
              </div>
              </div>
            </li>
            <?php 
          } ?>
            
          </ul>
        </div>
      </div>
    </nav>


