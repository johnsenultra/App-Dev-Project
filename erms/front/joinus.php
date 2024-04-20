<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">

<script type="text/javascript">
        function validate_form() {
            if (document.emp.emp_name.value == "") {
                alert("Please fill in the 'Your Employee Name' box.");
                return false;
            }
            if (document.emp.num.value == "") {
                alert("Enter Employee Number");
                return false;
            }
            alert("sucessfully Submitted");
 
 
 
            if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/).test(document.emp.email_id.value)) {
                alert("You have entered an invalid email address!")
                return (false)
            }
        }
 
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode != 46 && charCode > 31 &&
                (charCode < 48 || charCode > 57)) {
                alert("Enter Number");
                return false;
            }
            return true;
        }
 
 
        //-->
    </script>
</head>
<body style="background: #eb782c">

    <div class="topnav container-fluid" id="myTopnav">
        <img src="images/logo_tech.png" class="image1 ms-5" style="width: 10%; height: 52px;" alt="logo" />
        
        <a href="../admin">Admin</a>
        <a href="../index.php">login/Register</a>
        <a href="contact.php">Contact</a>
        <a href="aboutus.html">About us</a>
        <a href="services.html">Services</a>
        <a href="index.html" class="active" >Home</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    
    <div class="container-fluid h-100 text-white">
        <form action="" class="bg-dark px-3" name="emp" onsubmit="return validate_form();" method="post">
            <h1 class="text-white pt-5">Employee Registration Form</h1>
            <div class="container">
                <div class="row mt-5">
                    <div class="col-md-3">
                        <label for="emp_name">Employee Name:</label>
                        <input type="text" class="form-control" name="emp_name">
                    </div>

                    <div class="col-md-3">
                        <label for="num">Employee Number:</label>
                        <input type="text" class="form-control" name="num" onkeypress="return isNumberKey(event)">
                    </div>

                    <div class="col-md-3">
                        <label for="S2">Address:</label>
                        <input type="text" class="form-control" rows="4" maxlen="200" name="S2" cols="20">
                    </div>

                    <div class="col-md-3">
                        <label for="txtFname1">Contact Number:</label>
                        <input type="text" class="form-control" onkeypress="return isNumberKey(event)" name="txtFName1">
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-md-3">
                        <label for="mydropdown">Job Location:</label>
                        <select name="mydropdown" class="form-control" id="">
                            <option value="Default">Default</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Australia">Australia</option>
                            <option value="Singapore">Singapore</option>
                            <option value="US">US</option>
                            <option value="Taiwan">Taiwan</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="mydropdown">Designation:</label>
                        <select name="mydropdown" class="form-control" id="">
                            <option value="Default">Default</option>
                            <option value="Software Development">Software Development</option>
                            <option value="IT Consulting Services">IT Consulting Services</option>
                            <option value="Cloud Solutins">Cloud Solutions</option>
                            <option value="Cybersecurity Services">Cybersecurity Services</option>
                            <option value="Data Analytics">Data Analytics</option>
                            <option value="Digital Marketing and E-Commerce Solutions">Digital Marketing and E-Commerce Solutions</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="email_id">Email:</label>
                        <input type="text" class="form-control" name="email_id">
                    </div>
                </div>
            </div>
            <div class="text-center">
                <input class="btn btn-primary w-50 ms-5 mb-2" type="submit" value="Submit" name="B4"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <br>
                <input class="btn btn-danger w-50 me-4 mb-5" type="reset" value="Clear" name="B5">
            </div>

        </form>
    </div>
</body>
</html>