<?php
$insert = false;
if(isset($_POST['name']))
{
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con)
    {
        die("connection failed due to " . mysqli_connect_error());
    }
    /*else{
        echo "Succesfully connected";
    }*/

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `form`.`details` (`name`, `age`, `gender`, `email`, `phone`, `address`, `desc`, `date_time`) VALUES ('$name', '$age', '$gender', '$email', '$address', '$phone', '$desc', current_timestamp());";

    if($con->query($sql) == true){
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>
<body>
    <img class="bg" src="bg.jpg" alt="nature" style="
    width: 100%;
    height: 110%;
    z-index: -1;
    position: absolute;
    opacity: 0.9;">
    <div class="container">
        <h1>Welcome To IIITKottayam</h1>
        <p>Kindly, Please fill the form given below.</p>
        <?php
            if($insert == true){
                echo "<p class='msg'>Thank you $name for submitting.</p>";
            }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <input type="text" name="address" id="address" placeholder="Enter your address">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any information here"></textarea>
            <button class="btn">submit</button>
        </form>
    </div>
</body>
</html>