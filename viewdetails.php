<?php
    session_start();
    require "connection.php";
    $id=$_GET['id'];
    $result = mysqli_query($conn,"SELECT * FROM studentdetails WHERE redgno='$id';");
    $applied = mysqli_query($conn,"SELECT * FROM appliedstudents WHERE redgno='$id';");
    $row2 = mysqli_fetch_assoc($applied);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Details</title>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        table{
        
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
<body>
    <div>
        <?php
            if(mysqli_num_rows($result)>0)
            {
                while($row1=mysqli_fetch_assoc($result))
                {
            ?>
            <table >
                <tr>
                    <td>Name </td>
                    <td>:</td>
                    <td><?php echo $row1['Name']?></td>
                </tr>
                <tr>
                    <td>Registration No. </td>
                    <td>:</td>
                    <td><?php echo $row1['redgno']?></td>
                </tr>
                <tr>
                    <td>CGPA </td>
                    <td>:</td>
                    <td><?php echo $row1['cgpa']?></td>
                </tr>
                <tr>
                    <td>Email </td>
                    <td>:</td>
                    <td><?php echo $row1['email']?></td>
                </tr>
                <tr>
                    <td>You requested for</td>
                    <td>:</td>
                    <td><?php echo $row1['Name']?></td>
                </tr>
                <tr>
                    <td>Address </td>
                    <td>:</td>
                    <td><?php echo $row1['address']?></td>
                </tr>
                <tr>
                    <td>You have applied to </td>
                    <td>:</td>
                    <td><?php echo $row2['fname']?></td>
                </tr>
                <?php
                    if($row1['approved']=='NO')
                    {
                ?>
                
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="faccept.php?id=<?php echo $id;?>" class="btn btn-success">Approve
                    <a href="fdecline.php?id=<?php echo $id;?>" class="btn btn-danger">Decline<td>
                </tr>
                <?php      
                    }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="fdashboard.php" class="btn btn-primary">Back to Dashboard<td>
                </tr>
            </table>
            <?php
                }
            }
            ?>
    </div>
</body>
</html>