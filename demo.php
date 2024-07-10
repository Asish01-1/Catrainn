
<?php
$loginSuccess = false;

if (isset($_POST['username'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "log";

    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con) {
        die("Connection to this database failed due to" . mysqli_connect_error());
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the combination of username and password exists in the database
    $checkLoginQuery = "SELECT * FROM `inn` WHERE `username`='$username' AND `pass`='$password';";
    $result = $con->query($checkLoginQuery);

    if ($result->num_rows == 1) {
        // Start a session and set user information in the session
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;

        // Set a flag for successful login
        $loginSuccess = true;

        // Redirect to a logged-in page or any other page you want
        header("Location: next_page.php");
        exit();
    } else {
        echo "Invalid login credentials";
    }

    $con->close();
}
?>
<!--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter the username or email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="pass" name="password" placeholder="Enter the password" required><br><br>

        <input type="submit" value="Login">
    </form>

    <?php
    // Display a message if login was unsuccessful
    if (isset($_POST['username']) && !$loginSuccess) {
        echo "Invalid login credentials";
    }
    ?>
</body>

</html> -->
