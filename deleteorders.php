<?php
include('connection.php');
$id = $_GET['id'];

$sql = "DELETE FROM orders WHERE id = $id";
if (mysqli_query($con, $sql)) {
    $_SESSION['sucessmessages'][] = "orders have been deleted successfully";
} else {
    $_SESSION['errormessages'][] = "Error deleting orders from the database! Try again.";
}
