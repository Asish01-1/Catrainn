<?php

$showalert = false;
$showerror = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
   

include 'dbconnect.php';
$username=$_POST["username"];
$password=$_POST["password"];
$cpassword=$_POST["cpassword"];
$sq = "SELECT * FROM inn WHERE username='$username';";
$resul= mysqli_query($conn, $sq);
$num = mysqli_num_rows($resul);
if ($num == 1) {
    $exists=true;
    echo"Error";
}
if(($password==$cpassword) && !$exists){
    $sql="INSERT INTO `log`.`inn` (`username`,`password`,`dt`) VALUES ('$username','$password',current_timestamp());";
    $result=mysqli_query($conn,$sql);
    if($result){
        $showalert=true;
    }
}
else{
    $showerror="Wrong Details Entered";
}
}
?>      

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
    <style>
        .itt{
            background-color:blue;
        }
    </style>
</head>
<body>
    <?php
        if($showalert){
            echo"Succefully Account Created";
        }
        if($showerror){
            echo $showerror;
        }
    ?>
    <section id="contact">
        <h1 class="h-primary center">SignUp Now</h1>
        <div id="contact-box">
    <form method="post" action="signup.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter the username or email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="pass" name="password" placeholder="Enter the password" required><br><br>
        <small>Password must contain numers,characters and symbols having length 8</small><br>

        <label for="password">Confirm Password:</label>
        <input type="password" id="cpass" name="cpassword" placeholder="Enter the password" required><br><br>

        <!-- <input type="submit" value="Login"> -->
        <!-- <input type="submit" value="Logout"> -->
        <input type="submit" value="SignUP">
        <button class="itt"><a href="./login.php">LogIn</a>

    </form>
    </div>
    </section>
</body>
</html>