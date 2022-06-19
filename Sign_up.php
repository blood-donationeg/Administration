<?php
include './config.php';

error_reporting(0);
// eliminates error reporting
session_start();
// starts a session

if (isset($_POST['submit'])) {      /* isset checks if the button is clicked or not - Post is a global variable to collect data from html form */
    $email = $_POST['email'];       /* once we checked that the buttton is clicked we start posting - post is the method in the form to insert values in db */
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";     /* sql query searches the db where email equals to the input email  */
        $result = mysqli_query($conn, $sql);          /* the actual query with 2 parameters the 1st is mandatory which is the connection the 2nd is the query that we want to excute */
        if (!$result->num_rows > 0) {     /* checks if the email where registered before */
            $sql = "INSERT INTO users (email, password)
					VALUES ('$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Wow! User Registration Completed.')</script>";
                $email = "";           /* erasing all the variables */
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>WBDMS | Sign up</title>
    <link rel="icon" type="image/png" sizes="32x32" href="./Images/favicon.ico.png" />

    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/Sign_up.css">

    <!-- JS -->
    <script src="https://kit.fontawesome.com/dfb217dfe6.js" crossorigin="anonymous"></script>
</head>

<body>
    <form action="" method="POST">
        <div class="ALL">
            <div class="signUpSide">
                <div class="signUp">
                    <p class="p1">Create new account</p></br>
                    <p class="p2">Email</p>
                    <input type="email" class="email" name="email" value="<?php echo $email; ?>" required>
                    <h6 style="height: 18px;" class="email-error"></h6>
                    <p class="p3">Password</p>
                    <input type="password" class="password" name="password" value="<?php echo $_POST['password']; ?>" required>
                    <i class="fa fa-eye-slash eye-one" data-show=".password"></i>
                    <h6 style="height: 18px;" class="pass-error"></h6>

                    <p class="p4">Retype Password</p>
                    <input type="password" class="password-two" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                    <i class="fa fa-eye-slash eye-two" data-show=".password-two"></i>
                    <h6 style="height: 18px;" class="pass-two-error"></h6>

                    <input type="submit" class="sign-up" value="Sign up" name="submit">
                    <p class="p4" style="font-size: 14px;color: #6e6e6e;letter-spacing: 1.5px;width: 245px">
                        Already have an account?<a href="./Sign_in.php">Sign in</a>
                    </p>
                </div>
            </div>
    </form>
    <div class="imageSide"><img src="./Images/LOGO.png" style=" width: 400px; margin-left: 190px; "></div>
    </div>
    <script src="./JS/Sign_up.js"></script>
</body>

</html>