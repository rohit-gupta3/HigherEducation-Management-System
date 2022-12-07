<?php
    session_start();
    require 'connection.php';
    $id=$_SESSION['sid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="pdf.js"></script>
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
    
    
    $res = mysqli_query($conn,"SELECT * FROM studentdetails WHERE redgno='$id'");
    if(mysqli_num_rows($res)>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $html = '<button class="btn btn-primary" id="download" style="float:right; margin-right:100px;margin-top:50px;">Download</button><div id="letter"><h1 style="text-align:center;">Vellore Institute of technology</h1><br><br><h3>Subject : To Whom it may concern</h3><p>Dear '.$row['Name'] .' '.$row['redgno'] .'</p><p>This is a demo letter of recommendation.I hope you succeed in life and have a great life ahead. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam, accusantium dicta, atque rerum veritatis doloribus fuga doloremque aliquam aspernatur at numquam qui consequuntur et eligendi quam natus quia dolore dolor in amet eum! Velit nesciunt commodi molestiae ea blanditiis magni, nihil dolor soluta quos itaque nisi asperiores, dolores omnis officiis.</p><p>It was a great pleasure to work with you</p><p>Dr. Jaya Kumar</p><p>Faculty ID</p></div><a href="fdashboard.php" class="btn btn-primary" style="float:right; margin-right:100px;margin-top:50px;">Back to Dashboard';
        }
        
        echo $html;
    }
    else{
        echo "ERROR";
    }
   
?>