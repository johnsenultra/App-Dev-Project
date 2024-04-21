<?php
session_start();
include('includes/dbconnection.php');

// Retrieve all pending leave requests
$sql = "SELECT * FROM leave_requests WHERE status = 'Pending'";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Leave Requests</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <?php include_once('includes/sidebar.php')?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include_once('includes/header.php')?>

                <div class="container-fluid mt-5">
                    <h2>Leave Requests - Pending Approval</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Reason</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['employee_id'] . "</td>";
                                    echo "<td>" . $row['start_date'] . "</td>";
                                    echo "<td>" . $row['end_date'] . "</td>";
                                    echo "<td>" . $row['reason'] . "</td>";
                                    echo "<td><a href='approve_leave.php?id=" . $row['id'] . "' class='btn btn-success btn-sm'>Approve</a> <a href='decline_leave.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Decline</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No pending leave requests.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- <a href="logout.php" class="btn btn-secondary">Logout</a> -->
                </div>
            </div>
        </div>
    </div>

    

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="../js/sb-admin-2.min.js"></script>

    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="../js/demo/datatables-demo.js"></script>

</body>
</html>
