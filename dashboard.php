<?php
session_start();
if(empty($_SESSION['id_user'])){
    header("Location: ../index.php");
}

include "includes/head.php";

//include "../includes/head.php";
?>

<section class="portfolio" id="portfolio">
<div class="container"></div>
</section>

  

<?php include "includes/footer.php"; ?>

