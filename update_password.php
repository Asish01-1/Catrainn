<?php
include 'dbconnect.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $otp = $_POST['otp'];
    $newPassword = $_POST['new_password'];

    // Check if the provided OTP is valid
    $checkOtpQuery = "SELECT * FROM users WHERE email = '$email' AND otp = $otp";
    $result = mysqli_query($conn, $checkOtpQuery);

    if (mysqli_num_rows($result) == 1) {
        // Update the password and clear the OTP
        $updatePasswordQuery = "UPDATE users SET password = '$newPassword', otp = NULL WHERE email = '$email'";
        mysqli_query($conn, $updatePasswordQuery);

        echo "Password updated successfully";
    } else {
        echo "Invalid OTP";
    }

    mysqli_close($conn);
}
?>
