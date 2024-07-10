<?php
 $insert=false;
if(isset($_POST['name'])){
   
    $server="localhost";
    $username="root";
    $password="";

    $con=mysqli_connect($server,$username,$password);
    if(!$con){
        die("connection to this database failed due to".
        mysqli_connect_error());
    }
    // echo"Success connecting to the db";
    $name=$_POST['name'];
    $message=$_POST['message'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $sql="INSERT INTO `foods`.`foodies` (`name`, `email`, `phone`, `message`, `dt`) VALUES ('$name', '$email', '$phone', '$message', current_timestamp());";
    // echo $sql;
    // INSERT INTO `foodies` (`slno`, `name`, `email`, `phone`, `message`, `dt`) VALUES ('2', 'vb vb ', 'jh@gmail.com', '36664646', 'gngh', current_timestamp());
    // -> is object operator
    if($con->query($sql)==true){
        echo"Submitted Successfully";
        $insert=true;
    }
    else{
        echo"ERROR:$sql <br> $con->error";
    }
    // $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you For Contact Us</title>
</head>
<body>
    <h1>We will consider this soon.</h1>
    <h2>See new updates on our whatsapp communitty <a href="https://chat.whatsapp.com/LUXVMqsM2RDJCVrRc5TezM">here</a><br></h2>
    <h2><a href="index.php">Go to main page</a></h2>
</body>
</html>
<!-- for choosing options or choosing multiple choices how to create that column in a database in phpmyadmin -->