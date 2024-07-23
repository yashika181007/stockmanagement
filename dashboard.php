<?php

session_start();
include "header.php";
include "sidebar.php";
?>



<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
 
<!-- phpinfo();
die; -->


    <?php
    if (isset($_SESSION['email'])) {
      echo "<h1>Welcome, " . $_SESSION['email'] . "!</h1>";
    }

    if (isset($_SESSION['sucessmessages']) && count($_SESSION['sucessmessages']) > 0) {

      foreach ($_SESSION['sucessmessages'] as $sucessmessages) {
        echo '<div style="color:green;">' . htmlspecialchars($sucessmessages) . '</div>';
      }

      $_SESSION['sucessmessages'] = [];
    }
    if (isset($_SESSION['errormessages']) && count($_SESSION['errormessages']) > 0) {

      foreach ($_SESSION['errormessages'] as $errormessages) {
        echo '<div style="color:red;">' . htmlspecialchars($errormessages) . '</div>';
      }

      $_SESSION['errormessages'] = [];
    }
    ?>
  </section>

</main><!-- End #main -->



<?php
include "footer.php";
?>