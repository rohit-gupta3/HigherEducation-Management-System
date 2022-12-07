<?php
    session_start();
    require "connection.php";
    $id=$_SESSION['id'];
    $sql = "SELECT * FROM studentdetails WHERE redgno='$id';";
    $result = mysqli_query($conn,$sql);
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //$redgno= $_SESSION["id"];
        $title =  $_POST['title'];
        $name =  $_POST['name'];
        $registration = $_POST['registration'];
        $passed =  $_POST['passed'];
        $dob = $_POST['dob'];
        $cgpa = $_POST['cgpa'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $aadhar = $_POST['aadhar'];

        $sql = "UPDATE `studentdetails` SET `userid`='$id',`gender`='$title',`Name`='$name',`redgno`='$registration',`cgpa`='$cgpa',`adharno`='$address',`Mobile`='$mobile',`dob`='$dob',`address`='$address',`passedyear`='$passed',`email`='$email' WHERE redgno='$id'";
        try{

            if(mysqli_query($conn,$sql))
            {
                header("location:sdashboard.php");
            }
        }
        catch(Exception $e)
        {
            $_SESSION['error'] ="Opps Something went wrong.";
            header("location: success.php");
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
    <link rel="icon" type="image/x-icon" href="assest\icon.png ">
    <title>Student-Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper" >

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"  id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">My Uni </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="sdashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="sdetails.php">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Details</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="srequest.php">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Request</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sletter.php">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Letter</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="status.php">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <span>Status</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                     <h3>Vellore Institute of Technology</h3>
                    <ul class="navbar-nav ml-auto">
                        
                        <div class="topbar-divider d-none d-sm-block"></div>
                        

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome, <?php echo $_SESSION['name']?></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div><h2 style="color:red;">You are updating your details</h2></div>
                    <div>
                        <div class="container px-4 my-4">
                        <?php while($row = mysqli_fetch_assoc($result))
                                {
                                echo '
                            <form id="contactForm" method="post" data-sb-form-api-token="API_TOKEN">
                            <div class="mb-3"><label class="form-label" for="title">Title</label>
                                <input class="form-control" type="text" value="'.$row["gender"].'"><label class="form-label" for="fullName">Full Name</label><input class="form-control" id="fullName" type="text" value="'.$row["Name"].'" data-sb-validations="required" /><div class="invalid-feedback" data-sb-feedback="fullName:required">Full Name is required.</div></div>
                                <div class="mb-3">
                                    <label class="form-label" for="registrationNumber">Registration Number</label>
                                    <input class="form-control" id="registrationNumber" type="text" value="'.$row["redgno"].'" placeholder="Registration Number" data-sb-validations="required" />
                                    <div class="invalid-feedback" data-sb-feedback="registrationNumber:required">Registration Number is required.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="cgpa">CGPA</label>
                                    <input class="form-control" id="cgpa" type="text" value="'.$row["cgpa"].'" placeholder="CGPA" data-sb-validations="required" />
                                    <div class="invalid-feedback" data-sb-feedback="cgpa:required">CGPA is required.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="mobileNumber">Mobile Number</label>
                                    <input class="form-control" id="mobileNumber" type="text" value="'.$row["Mobile"].'" placeholder="Mobile Number" data-sb-validations="required" />
                                    <div class="invalid-feedback" data-sb-feedback="mobileNumber:required">Mobile Number is required.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="mobileNumber">Email ID</label>
                                    <input class="form-control" id="mobileNumber" type="email" value="'.$row["email"].'" placeholder="Email" data-sb-validations="required" />
                                    <div class="invalid-feedback" data-sb-feedback="mobileNumber:required">Email is required.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="aadharCardNumber">AadharCard Number</label>
                                    <input class="form-control" id="aadharCardNumber" type="text" value="'.$row["adharno"].'" placeholder="AadharCard Number" data-sb-validations="required" />
                                    <div class="invalid-feedback" data-sb-feedback="aadharCardNumber:required">AadharCard Number is required.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="passedYear">Passed Year</label>
                                    <input class="form-control" id="passedYear" type="text" value="'.$row["passedyear"].'" placeholder="Passed Year" data-sb-validations="required" />
                                    <div class="invalid-feedback" data-sb-feedback="passedYear:required">Passed Year is required.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="dateOfBirth">Date of Birth</label>
                                    <input class="form-control" id="dateOfBirth" type="text" value="'.$row["dob"].'" placeholder="Date of Birth" data-sb-validations="required" />
                                    <div class="invalid-feedback" data-sb-feedback="dateOfBirth:required">Date of Birth is required.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="address">Address</label>
                                    <input class="form-control" id="address" type="text" value="'.$row["address"].'" placeholder="Address" data-sb-validations="required" />
                                    <div class="invalid-feedback" data-sb-feedback="address:required">Address is required.</div>
                                </div>
                                <div class="d-none" id="submitErrorMessage">
                                    <div class="text-center text-danger mb-3">Error sending message!</div>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Update</button>
                                </div>
                            </form>
                        </div>';
                    }?>
                        
                        
                    </div>
               
                
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; My Uni @2022<T/span>
                    </div>
                </div>
            </footer>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
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
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>