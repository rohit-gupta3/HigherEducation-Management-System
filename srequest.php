<?php
    session_start();
    require "connection.php";
    $id=$_SESSION['id'];
    if(isset($_POST['submit']))
    {
        //$redgno= $_SESSION["id"];
        $pname =  $_POST['projectname'];
        $fname = $_POST['fname'];
        $pstart =  $_POST['StartDate'];
        $pend = $_POST['Enddate'];
        $reqdoc = $_POST['reqdoc'];
        $description = $_POST['description'];

        $sql = "INSERT INTO `appliedstudents` (`redgno`, `fname`, `pstart`, `pend`, `docrequired`, `pdescription`,`pname`) VALUES ('$id', '$fname', '$pstart', '$pend', '$reqdoc','$description' ,'$pname');";
        try{
            if(mysqli_query($conn,$sql))
            {
                echo "<script>alert('You have submitted your request');</script>";
            }
            else{
                echo 'ERROR';
            }
        }
        catch(Exception $e)
        {
            $_SESSION['error'] ="Sorry your details are already submitted.";
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
    <title>Dashboard</title>

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
         .yourdashboard{
            background-color:rgb(208, 207, 207);
           
            width: 100%;
         }
         #menu{
            display: grid;
            grid-template-columns: 300px 1fr;
         }
    h2 {
        font-family: Arial;
        font-size: 25px;
        font-style: normal;
        font-weight: bold;
        color: black;
        text-align: center;
        text-decoration: underline;
    }
    table {
    background-color: white;
    font-size: 18px;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
    border-radius: 4px;
}
input[type=text] {
    box-sizing: border-box;
    width: 80%;
    padding: 10px 5px;
    margin-top: 15px;
    margin-right: 15px;
    border-radius: 5px;
}
input[type=date] {
    box-sizing: border-box;
    width: 80%;
    margin: 8px 0;
    padding: 8px 5px;
    border-radius: 5px;
}
select {
    box-sizing: border-box;
    width: 80%;
    margin: 8px 0;
    padding: 10px 5px;
    border-radius: 5px;
}
textarea {
    padding: 2px;
    line-height: 1;
    border-radius: 5px;
    box-sizing: border-box;
    } 
    .reset1 {
    width: 30%;
    background-color: #547ef3;
    color: white;
    padding: 12px 8px;
    margin-right: 50px;
    margin-left: -50px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 15px;

    margin-top: auto;
}
.reset2:hover{
        background-color: #584ca0;
     }
     button[type=submit] {
    width: 65%;
    padding: 12px 8px;
    margin-left: 80px;
    margin-top: auto;
    /* margin-bottom: 20px; */
    margin-right: -20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    background-color: #33d439;
    color: white;
    font-size: 15px;
}

button[type=submit]:hover {
    background-color: #45a049;
}
.row1{
    visibility: hidden;
    display: none;
}
.reset2{
    visibility: hidden;
    display: none;
}
@media only screen and (min-width:180px) and (max-width:600px) {
    
    table{
           text-align: left;
            padding: auto;
            margin-top: auto;
            }
        .col1 {
            visibility: hidden;
            display: none;
        }
        .row1{
            visibility: visible;
            display: block;
            }
        button[type=submit]{
            width:30%;
            margin-left:-120px;
        }
         .reset1{
             visibility: hidden;
             display: none;
         }
         .reset2{
           
             visibility: visible;
             display: block;
             width: 30%;
             background-color: white;
             color: white;
             padding: 12px;
             margin-right: auto;
             margin-left: 160px;
             border: none;
             border-radius: 4px;
             cursor: pointer;
             font-size: 15px;
             margin-bottom: 20px;
             margin-top: -60px;
            }
         .reset2:hover{
            background-color: #584ca0;
         }
        
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
            <li class="nav-item ">
                <a class="nav-link" href="sdashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sdetails.php">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Details</span></a>
            </li>
            <li class="nav-item active">
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
                    <?php
                        if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM studentdetails WHERE redgno='$id';"))>0)
                        {

                        
                    ?>
                    <form method="post">
                        <table cellpadding="10" cellspacing="2" align="center">
                            <th class="row1">Project Title</th>
                            <tr>
                                <td class="col1">Project Name</td>
                                <td class="col2"><input type="text" name="projectname" id="PName" placeholder="Project name"></td>
                            </tr>
                            <th class="row1">Assigned to</th>
                            <tr>
                                <td class="col1">Faculty</td>
                                <td class="col2">
                                    <select name="fname" id="projectAssigned">
                                        <option value="Swathi J.N">Swathi J.N</option>
                                        <option value="JayaKumar">JayaKumar</option>
                                        <option value="Vijesh Joe C">Vijesh Joe C</option>
                                    </select>
                                </td>
                            </tr>
            
                            <th class="row1">Start Date</th>
                            <tr>
                                <td class="col1">Start Date</td>
                                <td class="col2"><input type="date" name="StartDate" id="SDate" class="startDate"></td>
                            </tr>
                            <th class="row1">End Date</th>
                            <tr>
                                <td class="col1">End Date</td>
                                <td class="col2"><input type="date" name="Enddate" id="EDate" class="endDate"></td>
                            </tr>
            
                            <th class="row1">Priority</th>
                            <tr>
                                <td class="col1">Requested Document</td>
                                <td class="col2">
                                    <select name="reqdoc" id="projectAssigned">
                                        <option>Letter of Recommendation</option>
                                        <option>Character Certificates</option>
                                        <option>Internship Certificate
                                        </option>
                                    </select>
                                </td>
                            </tr>
                                <th class="row1">Description</th>
                                <tr>
                                    <td class="col1">Description</td>
                                    <td class="col2"><textarea name="description" id="description" cols="35" rows="4"></textarea></td>
                                </tr>
                                <tr colspan="2" align="center">
                                    <td>
                                        <input type="submit" class="submit1" name="submit"  value="Submit" onclick="submitProjectDetails()">
                                    </td>
                                    <td>
                                        <button type="reset" class="reset1" onclick="resetProjectDetails()">Clear</button>
                                    </td>
                                </tr>
                            </table>
                    </form>
                    <?php
                        }
                        else{
                            echo "Please First Submit Your Details first;";
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

</body>

</html>