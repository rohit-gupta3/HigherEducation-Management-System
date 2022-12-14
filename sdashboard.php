<?php
    session_start();
    require 'connection.php';
    
    $id=$_SESSION['id'];
    $name = $_SESSION['name'];
    $mails = mysqli_query($conn,"SELECT * FROM facultymessage WHERE redgno='$id'");
    $no_mail = mysqli_num_rows($mails);
    $result = mysqli_query($conn,"SELECT * FROM studentdetails WHERE redgno='$id';");
    $applied = mysqli_query($conn,"SELECT * FROM appliedstudents WHERE redgno='$id';");
    $check = mysqli_num_rows($applied);
    $row2 = mysqli_fetch_assoc($applied);
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
    
    <style>
        td{
            margin-right: 25px;
            margin-left: 10px;
            margin-top: 15px;
        }
 
        table{
            width:500px;
            border:1px solid black;
            margin-top:50px;
            margin-left: 200px;
        }
        tr{
            padding:5px;
            font-size:25px
        }

    </style>
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
            <li class="nav-item active">
                <a class="nav-link" href="sdashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
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
                        
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"><?php echo $no_mail?></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <?php
                                        while($mess=mysqli_fetch_assoc($mails))
                                        {
                                ?>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    
                                    <div>
                                        <div class="text-truncate"><?php echo $mess['message'] ?></div>
                                        <div class="small text-gray-500"><?php echo $mess['fname'] ?></div>
                                    </div>
                                    <br>
                                    <?php
                                        }
                                    ?>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>
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
                    <div><h2>Your Details:</h2></div>
                    <?php
                        if(mysqli_num_rows($result)>0)
                        {
                            while($row1=mysqli_fetch_assoc($result))
                            {
                        ?>
                        <table >
                            <tr>
                                <td>Name :</td>
                                <td><?php echo $row1['Name']?></td>
                            </tr>
                            <tr>
                                <td>Registration No. :</td>
                                <td><?php echo $row1['redgno']?></td>
                            </tr>
                            <tr>
                                <td>CGPA :</td>
                                <td><?php echo $row1['cgpa']?></td>
                            </tr>
                            <tr>
                                <td>Email :</td>
                                <td><?php echo $row1['email']?></td>
                            </tr>
                            <tr>
                                <td>You requested for:</td>
                                <td><?php echo $row1['Name']?></td>
                            </tr>
                            <tr>
                                <td>Address :</td>
                                <td><?php echo $row1['address']?></td>
                            </tr>
                            <tr>
                                <td>You have applied to: </td>
                                <?php if($check >0)
                                    {
                                    ?>
                                    <td><?php echo $row2['fname']?></td>
                                    <?php
                                    }
                                    else{
                                        ?>
                                        <td>None</td>
                                        <?php
                                    }
                                    ?>
                                
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            
                        </table>
                        <button type="button" style="margin-left:600px;margin-top:10px;font-size:24px;" class="btn btn-primary" onclick="window.location.replace('supdate1.php');">Update</button>
                        <?php
                            }
                        }
                        ?>
               
                
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
                        <span aria-hidden="true">??</span>
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

</body>

</html>