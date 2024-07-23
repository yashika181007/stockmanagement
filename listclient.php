<?php
include('connection.php');
include "header.php";
include "sidebar.php";
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Client</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item">Client</li>

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
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>GST</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM client";
                                $result = mysqli_query($con, $sql);
                                $x = 1;
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tr>
                                            <td><?php echo $x ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['phone']; ?></td> 
                                            <td><?php echo $row['GST']; ?>%</td> 
                                       
                                
                                            <td><a href="editclient.php?id=<?php echo $row['id']; ?>">EDIT</a>||<a href="deleteclient.php?id=<?php echo $row['id']; ?>">DELETE</a></td>
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