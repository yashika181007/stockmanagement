<?php
include('connection.php');
$id = $_GET['id'];

$sql = "DELETE FROM invested_amount WHERE id = $id";
if (mysqli_query($con, $sql)) {
    $_SESSION['sucessmessages'][] = "Files have been deleted successfully";
} else {
    $_SESSION['errormessages'][] = "Error deleting files from the database! Try again.";
}
