<?php
session_start();

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'cpct';

$conn = mysqli_connect($dbhost, $dbuser, '', $db);


if (isset($_POST['submit'])) {
    $username = $_POST['aname'];
    $enterpassword = $_POST['pass'];
    $q1 = "SELECT * FROM admin WHERE aname = '$username' AND password = '$enterpassword' ";
    $result1 = mysqli_query($conn, $q1);
    $p1 = mysqli_num_rows($result1);

$exepassword = $_GET['pass'];

$q2 = "SELECT * FROM admin WHERE password = '$exepassword'  ";
$result2 = mysqli_query($conn, $q2);
$p2 = mysqli_num_rows($result2);

if($p1 != $p2){
    header('Location: ahome.php');
}
else{
    $_SESSION['name_alert'] = '1';
    header('Location: aloginmain.php');
}
}

    if (mysqli_num_rows($result) >= 1) {
        header('Location: ahome.php');
    } else {
        echo "incorrect";
}



?>



