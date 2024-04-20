<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ERMS | Home Page</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <style>

    .heroImg img {
      border-radius: 10px;
      margin-bottom: 1rem;
    }
    /* For mobile devices */
    @media (max-width: 768px) {
        .heroImg img {
            max-width: 100%;
            height: auto;
        }
    }

    /* For larger screens (desktops, tablets, etc.) */
    @media (min-width: 769px) {
        .heroImg img {
            max-width: 100%;
            height: 400px; /* You can adjust the height as needed */
        }
    }

  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper" >

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column mb-5">

      <!-- Main Content -->
      <div id="content">

       
        <!-- Begin Page Content -->
        <div class="container-fluid">

         <!-- <div class="position-absolute w-50" style="opacity: 1.1; left:20%;">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
              <path fill="#0F62FE" d="M38,-43.6C54.3,-31.5,76.2,-24.4,78.3,-13.6C80.5,-2.8,62.8,11.6,51.8,29.2C40.8,46.7,36.4,67.4,25.6,72.1C14.8,76.7,-2.4,65.4,-22.1,59C-41.7,52.5,-63.8,51,-67,40.9C-70.2,30.7,-54.6,11.9,-50.8,-8.9C-47,-29.7,-55.1,-52.5,-48.6,-66.2C-42.1,-80,-21.1,-84.7,-5.1,-78.6C10.8,-72.5,21.6,-55.6,38,-43.6Z" transform="translate(100 100)" />
            </svg>
          </div> -->

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4" style="margin-top: 2%">
            <h1 class="h3 mb-0 text-gray-800">Employee Record Management System</h1>
          </div>
          

          <div class="row">
            <div class="col-md-4">
            </div>

            <div class="col-md-6">
              <div class="heroImg">
                <img style=" max-width: 100%;" src="img/4706357.jpg" alt="">
              </div>
            </div>

            <div class="col-md-4">
            </div>
          </div>

          <div class="row">

          
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">  <a href="loginerms.php">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">User Signin</div>
                      </a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a href="registererms.php">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">User Signup</div>
                 </a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="admin/">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Admin Login</div>
                   </a>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      
          
          </div>

          
          
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <div class="fixed-bottom">
        <?php include_once('includes/footer.php');?>
      </div>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
