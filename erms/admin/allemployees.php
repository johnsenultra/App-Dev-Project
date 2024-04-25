<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_GET['delid'])) {
        $eid = $_GET['delid'];
        $query = mysqli_query($con, "DELETE employeedetail, empexperience, empeducation FROM employeedetail
            LEFT JOIN empexperience ON empexperience.EmpID = employeedetail.ID
            LEFT JOIN empeducation ON empeducation.EmpID = employeedetail.ID
            WHERE employeedetail.ID = '$eid'");
        echo "<script>alert('Record Deleted successfully');</script>";
        echo "<script>window.location.href='allemployees.php'</script>";
    }

    // search function
    $search = '';
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $search_condition = "WHERE EmpFname LIKE '%$search%' OR EmpLName LIKE '%$search%' OR EmpEmail LIKE '%$search%' OR EmpContactNo LIKE '%$search%'";
    } else {
        $search_condition = '';
    }

    $limit = 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // fecth the records with pagination and search
    $query = "SELECT * FROM employeedetail $search_condition ORDER BY ID DESC LIMIT $offset, $limit";
    $result = mysqli_query($con, $query);
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Employees Details</title>
    <!-- Custom fonts for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
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
                    <h1 class="h3 mb-4 text-gray-800">Employees Details</h1>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <form action="allemployees.php" method="get" class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..." value="<?php echo $search; ?>">
                                </div>
                                <button type="submit" class="btn btn-primary ms-3">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>S no.</th>
                                    <th>Profile</th>
                                    <th>Emp Code</th>
                                    <th>Emp First Name</th>
                                    <th>Emp Last Name</th>
                                    <th>Emp Email</th>
                                    <th>Emp Contact no</th>
                                    <th>Emp Joining Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cnt = $offset + 1;
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $cnt;?></td>
                                        
                                        <td>

                                          <?php
                                            if (!empty($row['profile_picture'])) {
                                                echo '<img src="../'.$row['profile_picture'].'" alt="Profile Picture" style="max-width: 60px; max-height: 69px; border-radius: 50%;">';
                                            } else {
                                                echo 'No Image';
                                            }
                                          ?>

                                        </td>
                                        <td><?php echo $row['EmpCode'];?></td>
                                        <td><?php echo $row['EmpFname'];?></td>
                                        <td><?php echo $row['EmpLName'];?></td>
                                        <td><?php echo $row['EmpEmail'];?></td>
                                        <td><?php echo $row['EmpContactNo'];?></td>
                                        <td><?php echo $row['EmpJoingdate'];?></td>
                                        <td>
                                            <a href="editempprofile.php?editid=<?php echo $row['ID']; ?>" title="Edit Profile Details"><i class="fa fa-edit"></i></a> |
                                            <a href="editempeducation.php?editid=<?php echo $row['ID']; ?>" title="Edit Education Details" style="color: orange;"><i class="fa fa-edit"></i></a> |
                                            <a href="editempexp.php?editid=<?php echo $row['ID']; ?>" title="Edit Experience Details" style="color: black;"><i class="fa fa-edit"></i></a> |
                                            <a href="document_employee.php?emp_id=<?php echo urlencode($row['ID']); ?>" title="View Documents"><i class="fa fa-eye color-success"></i></a>
                                            <a href="allemployees.php?delid=<?php echo $row['ID']; ?>" title="Delete" onclick="return confirm('Do you really want to delete?');" style="color: red;"><i class="fas fa-trash-alt"></i></a>
                                        </td>

                                    </tr>
                                <?php 
                                    $cnt++;
                                    
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <?php
                    $total_records = mysqli_num_rows(mysqli_query($con, "SELECT * FROM employeedetail $search_condition"));
                    $total_pages = ceil($total_records / $limit);
                    ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php
                            if ($page > 1) {
                                echo '<li class="page-item"><a class="page-link" href="allemployees.php?page='.($page - 1).'&search='.$search.'">Previous</a></li>';
                            }
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo '<li class="page-item '.($page == $i ? 'active' : '').'"><a class="page-link" href="allemployees.php?page='.$i.'&search='.$search.'">'.$i.'</a></li>';
                            }
                            if ($page < $total_pages) {
                                echo '<li class="page-item"><a class="page-link" href="allemployees.php?page='.($page + 1).'&search='.$search.'">Next</a></li>';
                            }
                            ?>
                        </ul>
                    </nav>
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>
<?php
    }
?>
