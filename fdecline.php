<?php
    require "connection.php";
    session_start();
    $id = $_GET['id'];
    $get = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM studentdetails WHERE redgno='$id';"));
    $name = $get['Name'];
    $redg = $get['redgno'];
    $fname= $_SESSION['name'];
    $sql="INSERT INTO `facultymessage`(`fname`, `studentname`, `redgno`, `message`) VALUES ('$fname','$name','$redg','Your details are rejected. Please call me');";
    if(mysqli_query($conn,$sql))
    {
        header("location:fdashboard.php");
    }

?>