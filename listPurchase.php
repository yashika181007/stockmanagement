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
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item">Purchase</li>

            </ol>
        </nav>
    </div>
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
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ParT ID</th>
                                    <th>Vendor ID</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM purchase";
                                $result = mysqli_query($con, $sql);
                                $x = 1;
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tr>
                                            <td><?php echo $x ?></td>
                                            <td><?php echo $row['part_id']; ?></td>
                                            <td><?php echo $row['vendor_id']; ?></td>
                                            <td><?php echo $row['qty']; ?></td>
                                            <td><?php echo $row['price']; ?></td>
                                            <td><?php echo $row['date']; ?></td>


                                            <td><a href="editPurchase.php?id=<?php echo $row['id']; ?>">EDIT</a>||<a href="detepurchase.php?id=<?php echo $row['id']; ?>">DELETE</a></td>
                                        </tr>
                                <?php
                                        $x++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
include "footer.php";
?>