<?php
include './config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['email'])) {
    header("Location: ./Normal.html");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        // header("Location: ./Normal.html");
    } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>WBDMS | Sign in</title>
    <link rel="icon" type="image/png" sizes="32x32" href="./Images/favicon.ico.png" />
    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/Sign_in.css">

    <!-- JS -->
    <script src="https://kit.fontawesome.com/dfb217dfe6.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="ALL">
        <div class="signInSide">
            <div class="login">
                <p class="p1">Sign in</p></br>

                <p class="p2">Email</p>
                <input type="email" class="email" name="email">
                <h5></h5>

                <p class="p2">Password</p>
                <input type="password" class="password">
                <i class="fa fa-eye-slash eye-one"></i>

                <input type="submit" class="log-in" value="Login">
                <p class="p4">Don't have an account?<a href="Sign_up.php">Sign up</a></p>
                <h6 style="height: 18px;" class="error"></h6>
            </div>
        </div>
        <div class="imageSide"><img src="./Images/LOGO.png" style="width: 400px; margin-left: 190px; "></div>
    </div>
    <script src="./JS/Sign_in.js"></script>
</body>

</html>