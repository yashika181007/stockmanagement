<?php
session_start();
include "header.php";
include "sidebar.php";
?>



<main id="main" class="main">

    <div class="pagetitle">
        <h1>Parts</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Parts</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">


            <div class="col-lg-12">
                <?php

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
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add parts here!</h5>


                        <form  class="row g-3" action="action.php" enctype="multipart/form-data" method="post">
                            
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Size</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="size">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="addparts">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>

                    </div>
                </div>


            </div>
        </div>
    </section>

</main><!-- End #main -->



<?php
include "footer.php";
?>