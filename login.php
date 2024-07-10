<?php
session_start();

$showerror = false;
$login = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM inn WHERE username='$username' AND password='$password';";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $row = mysqli_fetch_assoc($result);
        // if (password_verify($password, $row['password'])) {
                $login = true;
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                echo "Redirecting you to next page..."; // Debug statement
                header("location: welcome.php");
                exit();  // Ensure that no further code is executed after the redirect 
            }
            //  else {
            //     $showerror = "Incorrect password";
            // }
        // }
    else {
        $showerror = "Invalid Credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>Login Page</title>
</head>

<body>
    <?php
    if ($login) {
        echo "You Are Successfully Logged In";
    }
    if ($showerror) {
        echo $showerror;
    }
    ?>
    <section id="contact">
        <h1 class="h-primary center">Log In Now</h1>
        <div id="contact-box">
    <form method="post" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter the username or email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="pass" name="password" placeholder="Enter the password" required><br><br>
        <small>Password must contain numbers, characters, and symbols having length 8</small><br>
        <input type="submit" value="LogIn">
        <button class="itt"><a href="./signup.php">SignUp</a>

    </form>
</div>
</section>
</body>

</html>
