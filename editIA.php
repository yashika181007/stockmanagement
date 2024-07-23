<?php
include('connection.php');
include "header.php";
include "sidebar.php";
$id = $_GET['id'];
$sql = "SELECT * FROM invested_amount WHERE id='$id'";
$result = mysqli_query($con, $sql);

?>



<main id="main" class="main">

    <div class="pagetitle">
        <h1>Invested Amount</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Invested Amount</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
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

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update Invested Amount here!</h5>

                        <!-- Vertical Form -->
                        <form class="row g-3" action="action.php" enctype="multipart/form-data" method="post">
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Amount</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="amount" value="<?php echo $row['amount']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Source</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="source" value="<?php echo $row['source']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="date" value="<?php echo $row['date']; ?>">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="updateAI">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- Vertical Form -->
                <?php
                                }
                            }
                ?>
                    </div>
                </div>


            </div>
        </div>
    </section>

</main><!-- End #main -->



<?php
include "footer.php";
?>