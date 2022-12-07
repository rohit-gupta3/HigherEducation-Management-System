<?php
    session_start();
    require("connection.php");
    
    $_SESSION['error'] = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = strtoupper($_POST['username']);
      $mypassword = $_POST['password']; 
      
      $sql = "SELECT * FROM studentlogin WHERE userid = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      //$active = $row['active'];
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
        
      if($count == 1) {
         
         $_SESSION['id'] = $myusername;
         $_SESSION['name']= $row['name'];
         header("location: sdashboard.php");
      }else {
         $_SESSION['error'] = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="icon" type="image/x-icon" href="assest\icon.png ">
    <style>
        *{
            box-sizing:border-box;
        }
        .topbackground{
            background-color:rgb(4, 4, 75);
            height: 100px;
        }
        .header{
            display:grid;
            grid-template-columns:20% 80%;
            margin-bottom: 50px;
        }
        .slogin{
            border:5px solid rgb(12, 12, 111); 
            display:inline-block;
            align-content:center;
            margin-left:30%;
            width : 40%;
        }
        #submit{
            background-color: rgb(15, 205, 15);
            color: white;
            padding: 12px 20px;
            border:1px solid black;
            margin-left:15%;
            width : 70%;
        }
        #submit:hover{
            opacity: 0.7;
            cursor:pointer;
        }
        form{
            background-color: rgb(228, 228, 228);
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="assest\vit-logo.png" alt="vit" height="80px">
        <div class="topbackground"  >
        </div>
    </div>
    
    
    <div class="slogin">
        
        <div style="text-align:center; font-size:22px; background-color:rgb(13, 13, 122);color:white; ">Student Login</div>
        <form action="?" method="post" onsubmit=" return gotodashboard()">
            <center>
            <div style="color:red;" id="error"><?php echo $_SESSION['error']; ?></div>
            <br>
            <br>
            
            Registration Number: 
            <input type="text" id="registration" name="username" placeholder="User ID"  ><br><br>
            Password: 
            <input type="password" id="password" name="password" placeholder="Password" >
            <br><br>
            </center>
            <input type="submit" value="Submit" id="submit" >
            <br><br>
            <div class="message"></div>
            <div >
                <a link href="#">Forget Password ?</a>
                <a style="float:right;" link href="lindex.html">Go to Homepage</a>
            </div><br>
        </form>
    </div>
</body>
<script>
    function gotodashboard()
    {
        var id = document.getElementById("registration").value;
            var pass = document.getElementById("password").value;
            if (id == "" /*!regName.test(name)*/) {
                alert("Please enter your Valid Name .");
                return false;
            }
            else if( pass.length < 3)
            {
                alert("Please enter a valid password");
                return false;
            }
        //location.replace("dashboard.html");
    }
</script>
</html>
