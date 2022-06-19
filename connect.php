<?php
$Ap = $_POST['Ap'];
$Am = $_POST['Am'];
$Bp = $_POST['Bp'];
$Bm = $_POST['Bm'];
$Op = $_POST['Op'];
$Om = $_POST['Om'];
$ABp = $_POST['ABp'];
$ABm = $_POST['ABm'];
$Plasma = $_POST['Plasma'];
$Platelets = $_POST['Platelets'];


// Database connection
$conn = new mysqli('localhost', 'root', '', 'wbdms');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into mansoura(Ap, Am, Bp, Bm, Op, Om, ABp, ABm, Plasma, Platelets) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiiiiiiii", $Ap, $Am, $Bp, $Bm, $Op, $Om, $ABp, $ABm, $Plasma, $Platelets);
    $execval = $stmt->execute();

    echo "Your information has been successfully registered, Thank you";
    header("Location: ./success.html");
    $stmt->close();
    $conn->close();
}
