<?php
include('includes/dbconnection.php');

if (isset($_GET['id'])) {
    $leave_id = $_GET['id'];

    // Update leave request status to Declined in the database
    $sql = "UPDATE leave_requests SET status = 'Declined' WHERE id = $leave_id";
    $con->query($sql);

    header('Location: admin_leaves.php');
    exit();
}
?>
