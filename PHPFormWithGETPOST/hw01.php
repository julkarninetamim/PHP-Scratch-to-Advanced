<?php
header("X-XSS-Protection:1");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Hello world</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/milligram.min.css">
    <style>
        body {
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="column column-60 column-offset-20">
            <h2>Our Form</h2>
            <p>orem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text </p>

            <p>
               <?php

           /*    $fname=$lname="";*/


                  $error = [
                    'errorfname'=>'',
                    'errorlname'=>''
                  ];



               if (isset($_POST['submit'])){
                   $fname= htmlspecialchars($_POST['fname'] ?? "");
                   $lname= htmlspecialchars($_POST['lname'] ?? "");

               }

               if (empty($_POST['fname'])){
                 $error['errorfname']="Enter Your First Name";
               }
               if (empty($_POST['lname'])){
                   $error['errorlname']="Enter Your last Name";
               }
               ?><br>
            </p>

        </div>
    </div>

    <div class="row">
        <div class="column column-60 column-offset-20">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text"name="fname" id="fname" value="<?php echo $fname??"";?>">
                    <span style="color: red;"><?php echo $error['errorfname'];?></span>

                </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text"name="lname" id="lname" value="<?php echo $lname??"";?>">
                <span style="color: red;"><?php echo $error['errorlname'];?></span>
            </div>



                <div class="form-group text-right">
                    <input type="submit" name="submit" value="Enter" class="btn btn-primary">
                </div>

            </form>
        </div>
    </div>
</div>
</body>
</html>