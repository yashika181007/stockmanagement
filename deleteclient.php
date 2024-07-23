<?php
include('connection.php');
$id = $_GET['id'];

$sql = "DELETE FROM client WHERE id = $id";
if (mysqli_query($con, $sql)) {
    $_SESSION['sucessmessages'][] = "client have been deleted successfully";
    
} else {
    $_SESSION['errormessages'][] = "Error deleting client from the database! Try again.";
}
