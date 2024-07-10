<?php
$login=false;
$showerror=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
include 'dbconnect.php';
$username=$_POST["username"];
$password=$_POST["password"];

    $sql="SELECT*FROM `inn` WHERE username='$username' AND password='$password';";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);

    if($num==1){
        $login=true;
    }
else{
    $showerror=true;
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if($showerror){
            echo"Wrong Details entered";
        }
        if($login){
            echo"Logged in";
        }
    ?>
    <form method="post" action="demo2.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter the username or email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="pass" name="password" placeholder="Enter the password" required><br><br>
        <!-- <small>Password must contain numers,characters and symbols having length 8</small><br> -->

        <!-- <input type="submit" value="Login"> -->
        <!-- <input type="submit" value="Logout"> -->
        <input type="submit" value="LogIn">

    </form>
</body>
</html>