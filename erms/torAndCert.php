<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['uid']) == 0) {
    header('location:logout.php');
    exit();
}

$msg = '';

if (isset($_POST['submit'])) {
    $eid = $_SESSION['uid'];
    $tor_uploaded = false;
    $certificate_uploaded = false;

    if (!empty($_FILES['tor_file']['name'])) {
        $tor_file_name = $_FILES['tor_file']['name'];
        $tor_tmp_name = $_FILES['tor_file']['tmp_name'];
        $tor_target_dir = "tor_files/";
        $tor_target_file = $tor_target_dir . basename($tor_file_name);

        if (move_uploaded_file($tor_tmp_name, $tor_target_file)) {
            $tor_path = $tor_target_file;
            $tor_type = $_POST['tor_type']; 
            mysqli_query($con, "INSERT INTO employee_documents (emp_id, document_type, document_path, document_label) VALUES ('$eid', 'TOR', '$tor_path', '$tor_type')");
            $tor_uploaded = true;
        } else {
            $msg .= "Error uploading TOR file.";
        }
    }

    if (!empty($_FILES['certificate_file']['name'])) {
        $certificate_file_name = $_FILES['certificate_file']['name'];
        $certificate_tmp_name = $_FILES['certificate_file']['tmp_name'];
        $certificate_target_dir = "certificate_files/";
        $certificate_target_file = $certificate_target_dir . basename($certificate_file_name);
        $certificate_type = $_POST['certificate_type'];
    
        if (move_uploaded_file($certificate_tmp_name, $certificate_target_file)) {
            $certificate_path = $certificate_target_file;
            mysqli_query($con, "INSERT INTO employee_documents (emp_id, document_type, document_path, document_label) VALUES ('$eid', 'Certificate', '$certificate_path', '$certificate_type')");
            $certificate_uploaded = true;
        } else {
            $msg .= "Error uploading certificate file.";
        }
    }

    if ($tor_uploaded || $certificate_uploaded) {
        $msg = "Files uploaded successfully.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TOR and Certificate</title>
    <!-- Custom fonts for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include_once('includes/sidebar.php')?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include_once('includes/header.php')?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid mt-5 pt-5">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">TOR & Certificate</h1>
                    <p style="font-size:16px; color:red" align="center">
                        <?php echo $msg; ?>
                    </p>
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Transcript of Records (TOR)</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" method="post" action="" enctype="multipart/form-data">
                                        <input type="file" class="form-control-file" id="tor_file" name="tor_file" accept="application/pdf" required>
                                        <input type="text" class="form-control mt-3" name="tor_type" placeholder="Type of TOR" required>
                                        <button type="submit" name="submit" class="btn btn-primary mt-3">Upload TOR</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Certificate</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" method="post" action="" enctype="multipart/form-data">
                                        <input type="file" class="form-control-file" id="certificate_file" name="certificate_file" accept="application/pdf" required>
                                        <input type="text" class="form-control mt-3" name="certificate_type" placeholder="Type of Certificate" required>
                                        <button type="submit" name="submit" class="btn btn-primary mt-3">Upload Certificate</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
