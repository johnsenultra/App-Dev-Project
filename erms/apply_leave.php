<?php
session_start();
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
    $employee_id = $_SESSION['uid'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $reason = $_POST['reason'];

    // insert leave request into database
    $sql = "INSERT INTO leave_requests (employee_id, start_date, end_date, reason)
            VALUES ($employee_id, '$start_date', '$end_date', '$reason')";

    if ($con->query($sql) === TRUE) {
        $_SESSION['leave_request_submitted'] = true;
        header('Location: apply_leave.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

if (isset($_SESSION['leave_request_submitted']) && $_SESSION['leave_request_submitted']) {
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                toast: true,
                text: "Leave request submitted successfully.",
                icon: "success",
                showConfirmButton: false,
                timer: 4000
            });
        });
    </script>';

    unset($_SESSION['leave_request_submitted']);

}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Apply for Leave</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">

    <div id="wrapper">
        
        <?php include_once('includes/sidebar.php')?>
        
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <!-- Topbar -->
                <?php include_once('includes/header.php')?>
                <!-- End of Topbar -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800" style="padding-left: 35px;">Apply For Leave</h1>

                    <div class="row text">
                        <div class="col-3">
                            
                        </div>
                        <div class="col-6">
                            
                            <form method="post" action="">
                                <label>Start Date:</label>
                                <input  class="form-control" type="date" name="start_date" required><br>
                                
                                <label>End Date:</label>
                                <input class="form-control" type="date" name="end_date" required><br>
                                
                                <label>Reason:</label><br>
                                <textarea class="form-control" name="reason" rows="4" cols="50" required></textarea><br><br>
                                
                                <input  type="submit" name="submit" value="Submit" class="btn btn-primary form-control">
                            </form>
                        </div>
                        <div class="col-3">
                            
                        </div>
                    </div>
                    
                </div>

            </div>

        </div>
    </div>

</body>
</html>
