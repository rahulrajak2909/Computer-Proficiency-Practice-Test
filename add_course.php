<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'cpct';

$conn = mysqli_connect($dbhost, $dbuser, '', $db);

if($_POST['submit']){

    $name = strtoupper($_POST['cname']);
//    $query = " INSERT INTO REGISTRATION VALUES ('$fname' , '$dob', '$email', '$phone', '$pwd', '$cpwd', '$gnd')";
   $query = "INSERT INTO course_add(cname) VALUES ('$name')";

$data = mysqli_query($conn, $query);

    if($data)
    {
        header('Location: admin_course.php');
    }
    else{
        echo "not inserted";
    }

}
?>