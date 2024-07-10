<?php
// Assuming you have a file named "db_connection.php" for database connection
include 'dbconnect.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
   

    include 'dbconnect.php';
    $username=$_POST["username"];
    $otp=$_POST["otp"];
    $sq = "SELECT * FROM inn WHERE username='$username';";
    $resul= mysqli_query($conn, $sq);
    $num = mysqli_num_rows($resul);
    if ($num == 1) {
        // Generate OTP
        $otp = rand(100000, 999999);

        // Store OTP in the database
        $updateQuery = "INSERT INTO `log`.`inn` (`otp`) VALUES ('$otp)';";
        
        mysqli_query($conn, $updateQuery);

        // Send OTP to the user (you may implement email or SMS functionality here)

        // Redirect to password reset page with email and OTP as parameters
        echo"OTP sent";
        header("Location: Forgot.php");
        exit();
    } else {
        echo "Username not found in the database";
    }

    mysqli_close($conn);
}
?>
