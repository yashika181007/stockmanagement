<?php
include('connection.php');
$id = $_GET['id'];

$sql = "DELETE FROM purchase WHERE id = $id";
if (mysqli_query($con, $sql)) {
    $_SESSION['sucessmessages'][] = "Files have been deleted successfully";
    header('Location: listPurchase.php');
} else {
    $_SESSION['errormessages'][] = "Error deleting files from the database! Try again.";
    header('Location: listPurchase.php');
}
