<div style="position: fixed; top: 0; left: 0; right: 0; z-index: 1;">
  
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <h3 class="text-primary" style="padding-left: 14%">Employee Record Management System</h3>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php
          $empid = $_SESSION['uid'];
          $ret = mysqli_query($con, "SELECT EmpFname, EmpLname, profile_picture FROM employeedetail WHERE ID='$empid'");
          $row = mysqli_fetch_array($ret);
          $fname = $row['EmpFname'];
          $lname = $row['EmpLname'];
          $profile_picture = $row['profile_picture'];
          ?>

          <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $fname." ".$lname; ?></span>
          <img class="img-profile rounded-circle" src="<?php echo $profile_picture; ?>">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="myprofile.php">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            My Profile
          </a>
          <a class="dropdown-item" href="changepassword.php">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Change Password
          </a>
          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
        </div>
      </li>

    </ul>

  </nav>
</div>
