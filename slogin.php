<?php
session_start();


// $dbhost = 'localhost';
// $dbuser = 'root';
// $dbpass = '';
// $db = 'cpct';

// $conn = mysqli_connect($dbhost, $dbuser, '', $db);
 require 'connect.php';
if (isset($_POST['submit'])) 
{
   $username = $_POST['email'];

   $_SESSION['stu_email'] = $username;

   $enterpassword = $_POST['pass'];

   $q1 = "SELECT * FROM registration WHERE email = '$username' AND pass = '$enterpassword' ";

   
   $result1 = mysqli_query($conn, $q1);
   $p1 = mysqli_num_rows($result1);

   $exppassword = $_GET['pass'];

   $q2 = "SELECT * FROM registration WHERE  pass = '$exppassword' ";
   $result2 = mysqli_query($conn, $q2);
   $p2 = mysqli_num_rows($result2);


   if($p1 != $p2){
      header('Location: shome.php');

   } else {
   $_SESSION['name_alert'] = '1';
   header('Location: index.php');

}
}


?>