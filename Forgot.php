<?php
include 'dbconnect.php';

if (isset($_GET['email']) && isset($_GET['otp'])) {
    $email = $_GET['email'];
    $otp = $_GET['otp'];
} else {
    // Handle the case when email or OTP is not provided
    echo "Invalid request";
    exit();
}

// Display a form for the user to enter the new password
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form action="update_password.php" method="post">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="otp" value="<?php echo $otp; ?>">
        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" required>
        <button type="submit" name="submit">Reset Password</button>
    </form>
</body>
</html>
