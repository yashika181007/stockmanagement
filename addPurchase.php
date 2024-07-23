<?php
include('connection.php');
include "header.php";
include "sidebar.php";
?>



<main id="main" class="main">

    <div class="pagetitle">
        <h1>Purchase</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Purchase</li>
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
                        <h5 class="card-title">Add purchase here!</h5>


                        <form class="row g-3" action="action.php" enctype="multipart/form-data" method="post">
                            <div class="row mb-3">
                                <label for="partSelect" class="col-sm-2 col-form-label">Part</label>
                                <div class="col-sm-10">
                                    <select name="part_id" id="partSelect" class="form-select">
                                        <?php
                                    
                                        $parts = mysqli_query($con, "SELECT id, name FROM parts");
                                        while ($part = mysqli_fetch_assoc($parts)) {
                                            echo "<option value='{$part['name']}'>{$part['name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="vendorSelect" class="col-sm-2 col-form-label">Vendor</label>
                                <div class="col-sm-10">
                                    <select name="vendor_id" id="vendorSelect" class="form-select">
                                        <?php
                                       
                                        $vendors = mysqli_query($con, "SELECT id, name FROM vendor");
                                        while ($vendor = mysqli_fetch_assoc($vendors)) {
                                            echo "<option value='{$vendor['name']}'>{$vendor['name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="qty">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" step="0.01" class="form-control" name="price">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="date">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="addpurchase">Submit</button>
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