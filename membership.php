<?php
 $insert=false;
if(isset($_POST['username'])){
    $submit=true;
    $server="localhost";
    $username="root";
    $password="";

    $con=mysqli_connect($server,$username,$password);
    if(!$con){
        die("connection to this database failed due to".
        mysqli_connect_error());
    }
    // echo"Success connecting to the db";
    $username=$_POST['username'];
    $hobby=$_POST['hobby'];
    $age=$_POST['age'];
    $mail=$_POST['mail'];
    $number=$_POST['number'];
    $loc=$_POST['loc'];
    $payment=$_POST['payment'];
    $weight=$_POST['weight'];
    $status=$_POST['status'];
    // $reading=$_POST['reading'];
    // $sports=$_POST['sports'];
    $sql="INSERT INTO `food`.`foody` (`username`, `mail`, `number`, `age`, `payment`, `weight`,`status`,`hobby`,`loc`, `dt`) VALUES ('$username', '$mail', '$number', '$age', '$payment', '$weight','$status','$hobby','$loc', current_timestamp());";
    // echo $sql;
    // INSERT INTO `foody` (`slno`, `username`, `mail`, `number`, `age`, `payment`, `weight`, `status`, `hobby`, `loc`, `dt`) VALUES ('1', 'Asish Dash', 'demo@gmail.com', '9777155263', '19', 'E787jh', '25', 'Student', 'Complex', 'Nil', current_timestamp());
    // -> is object operator
    if($con->query($sql)==true){
        // echo"/basics.html";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Form</title>
    <!-- Blackkops/Blakessom/Rakenecks/Starstropex/Grex -->
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" media="screen and (max-width: 1170px)" href="css/phone.css"> -->

    <style>
        body{
            font-family: 'Baloo Bhai', cursive;
            background-color: blanchedalmond;
        }
        #sd{
            display: flex;
    justify-content: center;
    align-items: center;
    padding-bottom: 34px;
        }
        #sd input, 
#sd textarea{
    width: 100%;
    padding: 0.5rem;
    border-radius: 9px;
    font-size: 1.1rem;
    color: black;
} 
        #sd input{
            padding:10px;
            border:2px solid black;
        }
        #sd form{
            width:40%;
        }
        #sd textarea{
    width: 100%;
    padding: 0.5rem;
    border-radius: 9px;
    font-size: 1.1rem;
} 
#sd::before{
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: -1;
    opacity: 0.7;
    background: url('ideogram.jpeg') no-repeat center center/cover;
    background-size: 800px 1200px;
    /* background-color: violet; */

}
#sd{
    position: relative;
}
h1,h3{
    align-items: center;
    text-align: center;
}
h2{
    align-items: center;
    text-align: center;
    color:green;
    font-family:cursive;
}
h4{
    color:red;
}
    </style>
</head>
<body>
 
    <h1>Be A Healthy Member</h1>
    <h3><a href="services.html">Now Get Our Membership(Pay Now)</a></h3>
    <?php
    if($insert==true){
    echo"<h2>Thanks for submitted successfully as a part of Ca-trainn</h2>";}
    ?>
    <div id="sd">
    <form action="membership.php" method="post">
        <h4>(** are mandatory to fill up the form)</h4>
        <label for="username">**Full Name:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">**Email Id</label>
        <input type="email" id="mail" name="mail" required><br><br>
        
        <label for="password">**Active Mobile Number</label>
        <input type="number" id="number" name="number" required><br><br>
        
        <label for="password">**Age</label>
        <input type="number" id="age" name="age" required><br><br>

        <label for="username">**Transaction/UPI ID:</label>
        <input type="text" id="payment" name="payment" placeholder="UPI number" required><br><br>

        <label for="username">Weight:</label>
        <input type="number" id="weight" name="weight"><br><br>

        <!-- <label>**Gender:</label>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male :</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female :</label><br><br> -->
        <label for="username">Status:</label>
        <input type="text" id="status" name="status" placeholder="Student/Employee/Anything else..."><br><br>
        <label for="username">Hobbies(Surprise Purpose):</label>
        <input type="text" id="hobby" name="hobby" placeholder="Sports/Travel/Reading.."><br><br>
        <!-- <label for="country">Status:</label>
        <select id="country" name="country">
            <option value="usa">Employee</option>
            <option value="canada">Student</option>
            <option value="uk">Own Work</option>
            <option value="australia">New Established</option>
        </select><br><br> -->

        <!-- <label for="hobbies">Hobbies:(Surprise purpose only)</label>
        <input type="checkbox" id="reading" name="reading" value="reading">
        <label for="hobby1">Reading</label>
        <input type="checkbox" id="hobby" name="hobby" value="traveling">
        <label for="hobby2">Traveling</label>
        <input type="checkbox" id="sports" name="sports" value="sports">
        <label for="hobby3">Sports</label><br><br> -->

        

        <label for="comments">**Location:</label><br>
        <textarea id="loc" name="loc" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Submit" require>
    </form>

</div>
</body>
</html>

