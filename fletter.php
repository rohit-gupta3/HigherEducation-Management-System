<?php
    session_start();
    require 'connection.php';
    if (isset($_POST['submitletter'])) {
        $pdf=$_FILES['letter']['name'];
        $pdf_type=$_FILES['letter']['type'];
        $pdf_size=$_FILES['letter']['size'];
        $pdf_tem_loc=$_FILES['letter']['tmp_name'];
        $pdf_store="pdf/".$pdf;
        $redgno = $_POST['registration'];
        move_uploaded_file($pdf_tem_loc,$pdf_store);
        
        $sql="INSERT INTO `documentupload` (`redgno`, `doc`) VALUES ('$redgno', '$pdf');";
        try{
            $query=mysqli_query($conn,$sql);
        }
        catch(Exception $e)
        {
            $_SESSION['error'] ="You have already upload the documents.";
            
        }
    }
    if(isset($_POST['submitgenerate']))
    {
        $_SESSION['sid'] = $_POST['generegist'];
        header("location:generate.php");
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
    <title>Faculty-Document</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
    <style>
        form
        {
            margin-left:20px;
        }
        p{
            font-size: 20px;
        }
        input,select{
            font-size: 20px;
            padding:10px;
        }
        button{
            font-size: 20px;
            padding:10px;
            background-color:#51d70c;
            margin:20px 20px 20px 20px;
        }
        button:hover{
            background-color:yellow;
            cursor: pointer;
        }
        .submit{
            background-color:#390be3;
        }
        .submit:hover{
            background-color:#e30b1a;
            cursor: pointer;
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
            <li class="nav-item">
                <a class="nav-link" href="fdashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="fdetails.php">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Search Details</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="fapproved.php">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Approved Students</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="fletter.php">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Upload Letters</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="fsendmail.php">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <span>Message</span></a>
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
                    <div><h2>Upload the Letters:</h2></div>
                    <div>
                    <button type="button" onclick="generate()" id="Generate Document">Generate Document</button>
                    <button type="button" onclick="upload()" id="Upload Document">Upload Document</button>
                    <form method="post" action="fletter.php" id="form2" enctype="multipart/form-data" style="display:none;">
                        <p>
                            Redg No:
                            <input type="text" name="registration" required>
                        </p>
                        <p>Upload the Document:
                            <input id='letter' type="file" name="letter" required>
                        </p>
                        <p>
                            <input type="submit" name="submitletter" class="submit">
                        </p>  
                    </form>
                    
                    <form id="form1" style="display:none;" method="post">
                        <p>
                            Redg No:
                            <input type="text" name="generegist" required>
                        </p>
                        <p>Select the Document to be generated:
                            <select name="type">
                                <option>Letter of Recommendation</option>
                                <option>Character Certificate</option>
                                <option>Intership Certificate</option>
                            </select>
                        </p>
                        <p>
                            <input type="submit" name="submitgenerate" class="submit">
                        </p>
                    </form>
                    <!-- Generating the pdf -->

                    <?php
                            if (isset($_GET['msg1'])) {
                            ?>
                                <h3><?php echo $_GET["msg1"]; ?></h3>
                            <?php
                            }
                            if (isset($_GET['msg2'])) {
                            ?>
                                <h4><?php echo $_GET["msg2"]; ?></h4>
                            <?php
                            }
                        ?>
                        
                    </div>
               
                
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <script>
                function generate()
                {
                    var x = document.getElementById("form1"); 
                    if (x.style.display === "none") {
                        x.style.display = "block"; 
                        } 
                        else {
                            x.style.display = "none";
                        }
                }
                function upload()
                {
                    var x = document.getElementById("form2"); 
                    if (x.style.display === "none") {
                        x.style.display = "block"; 
                        } 
                        else {
                            x.style.display = "none";
                        }
                }
                
            </script>
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
</head>