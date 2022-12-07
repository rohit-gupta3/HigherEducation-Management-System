<?php
    session_start();
    require "connection.php";
    $id = $_GET['id'];
    $sql="UPDATE `studentdetails` SET `approved`='YES' WHERE redgno='$id';";
    if(mysqli_query($conn,$sql))
    {
        header("location:fdashboard.php");
    }

?>