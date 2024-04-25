<?php
session_start();
include('includes/dbconnection.php');

if (empty($_SESSION['aid'])) {
    header('location:logout.php');
    exit();
}

if (isset($_GET['emp_id'])) {
    $emp_id = $_GET['emp_id'];

    $query = "SELECT * FROM employee_documents WHERE emp_id = '$emp_id'";
    $result = mysqli_query($con, $query);

    if (!$result || mysqli_num_rows($result) == 0) {
        $no_documents_message = '<p class="text-center mt-4">No documents uploaded for this employee.</p>';
    } else {
        $no_documents_message = ''; 
    }
} else {
    echo '<div class="col"><p>Employee ID not specified.</p></div>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View Employee Documents</title>
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
                    <h1 class="mb-4">Employee Documents</h1>

                    <?php echo $no_documents_message; ?>

                    <div class="row">
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            $document_type = $row['document_type'];
                            $document_path = $row['document_path'];
                            $document_label = $row['document_label'];

                            $base_url = 'http://localhost/Employee-Record-Management-System-Project/erms/';

                            $document_url = $base_url . $document_path;
                        ?>
                            <div class="col-lg-4">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo htmlspecialchars($document_type); ?></h5>
                                        <p class="card-text"><?php echo htmlspecialchars($document_label) . ' (' . $document_type . ')'; ?></p>
                                        <a href="<?php echo htmlspecialchars($document_url); ?>" target="_blank" class="btn btn-primary">View Document</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

    
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="../js/sb-admin-2.
