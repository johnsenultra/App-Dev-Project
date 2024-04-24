<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['uid']) == 0) {
    header('location:logout.php');
    exit();
} else {
    if (isset($_POST['submit'])) {
        $eid = $_SESSION['uid'];
        $FName = $_POST['FirstName'];
        $LName = $_POST['LastName'];
        $empcode = $_POST['EmpCode'];
        $EmpDept = $_POST['EmpDept'];
        $EmpDesignation = $_POST['EmpDesignation'];
        $EmpContactNo = $_POST['EmpContactNo'];
        $gender = $_POST['gender'];
        $empjdate = $_POST['EmpJoingdate'];

        // check if the file is selected for upload
        if (!empty($_FILES['profile_pic']['name'])) {
            $file_name = $_FILES['profile_pic']['name'];
            $file_tmp = $_FILES['profile_pic']['tmp_name'];
            $file_type = $_FILES['profile_pic']['type'];
            $file_size = $_FILES['profile_pic']['size'];

            // navigate the target directory where the file will be stored
            $target_dir = "profile/";
            $target_file = $target_dir . basename($file_name);

            // move the uploaded file to the specified directory
            if (move_uploaded_file($file_tmp, $target_file)) {
                $profile_pic_path = $target_file;

                $query = "UPDATE employeedetail SET EmpFname='$FName', EmpLName='$LName', EmpCode='$empcode', EmpDept='$EmpDept', EmpDesignation='$EmpDesignation', EmpContactNo='$EmpContactNo', EmpGender='$gender', EmpJoingdate='$empjdate', profile_picture='$profile_pic_path' WHERE ID='$eid'";
                $result = mysqli_query($con, $query);

                if ($result) {
                    $msg = "Your profile has been updated.";
                } else {
                    $msg = "Error updating profile. Please try again.";
                }
            } else {
                $msg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $msg = "Please select a profile picture.";
        }
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
    <title>My Profile</title>

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
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="pt-lg-5 h3 mt-5 text-gray-800">My Profile</h1>
                    
                    <form class="user" method="post" action="" enctype="multipart/form-data">
                        <?php
                        $eid = $_SESSION['uid'];
                        $ret = mysqli_query($con, "SELECT * FROM employeedetail WHERE ID='$eid'");
                        if ($ret && mysqli_num_rows($ret) > 0) {
                            $row = mysqli_fetch_array($ret);
                        ?>
                          <!-- Profile Picture -->
                            <div class="mt-3 pb-3 text-center">
                              <div style="width: 150px; height: 150px; border-radius: 50%; overflow: hidden; margin: 0 auto;">
                                <?php if (!empty($row['profile_picture'])) { ?>
                                    <img src="<?php echo $row['profile_picture']; ?>" class="img-fluid" alt="Profile Picture">
                                  <?php } else { ?>
                                    <div style="width: 100%; height: 100%; background-color: #ddd; display: flex; justify-content: center; align-items: center;">
                                        <i class="fas fa-user fa-3x text-gray-600"></i>
                                    </div>
                                <?php } ?>
                              </div>
                              <input type="file" class="p-2 mt-2 rounded-3 bg-success" id="profile_pic" name="profile_pic" accept="image/*">
                            </div>

                            <p style="font-size:16px; color:red" align="center">
                              <?php echo isset($msg) ? $msg : ''; ?>
                            </p>
                        
                            <div class="row">
                                <div class="col-4 mb-3">First Name</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="FirstName" name="FirstName" aria-describedby="emailHelp" required="true" value="<?php echo $row['EmpFname']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Last Name</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="LastName" name="LastName" aria-describedby="emailHelp" required="true" value="<?php echo $row['EmpLName']; ?>">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-4 mb-3">Employee Code</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="EmpCode" name="EmpCode" aria-describedby="emailHelp" required="true" value="<?php echo $row['EmpCode']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employee Dept</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="EmpDept" name="EmpDept" aria-describedby="emailHelp" required="true" value="<?php echo $row['EmpDept']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employee Designation</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="EmpDesignation" name="EmpDesignation" aria-describedby="emailHelp" required="true" value="<?php echo $row['EmpDesignation']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employee Contact No.</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="EmpContactNo" name="EmpContactNo" aria-describedby="emailHelp" required="true" value="<?php echo $row['EmpContactNo']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employee Joining Date (yyyy-mm-dd)</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="EmpJoingdate" name="EmpJoingdate" aria-describedby="emailHelp" value="<?php echo $row['EmpJoingdate']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Gender</div>
                                <div class="col-4 mb-3">
                                    <input type="radio" id="genderMale" name="gender" value="Male" <?php echo ($row['EmpGender'] == 'Male') ? 'checked' : ''; ?>>
                                    <label for="genderMale">Male</label>
                                    <input type="radio" id="genderFemale" name="gender" value="Female" <?php echo ($row['EmpGender'] == 'Female') ? 'checked' : ''; ?>>
                                    <label for="genderFemale">Female</label>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row" style="margin-top:4%">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <input type="submit" name="submit" value="Update" class="btn btn-primary btn-user btn-block mb-3">
                            </div>
                        </div>
                    </form>
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
    <script type="text/javascript">
        $(".jDate").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        }).datepicker("update", "10/10/2016");
    </script>
</body>

</html>
