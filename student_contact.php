<?php
session_start();

 require 'connect.php';

  $stu_email = $_SESSION['stu_email'];

  $query_for_stu_details = "SELECT fname, email FROM registration where email = '$stu_email'";

    $query_stu_info = mysqli_query($conn, $query_for_stu_details);

    $stu_info = mysqli_fetch_assoc($query_stu_info);

    if(empty($stu_info)){
        echo "Student data is not available"; 
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="vieport" content="width=device-width, initial-scale=1.0">
    <title>Contect</title>
    <link rel="stylesheet" href="admin_contect.css">
    <style>
      body{
     background: linear-gradient(to bottom left, #79c2d0 , white);
     background-attachment: fixed;
       
      }
    </style>

</head>
<body> 
  <div class="div" style='margin-left: -1rem; background-color: #28666e; border-bottom: white; padding: 0rem 0rem 0.5rem 0rem  '>
       <div class="name" style='color: white; margin-left: 2rem'><ion-icon name="logo-buffer" style='color: white'></ion-icon> Computer Proficiency Practice Test </div>
        <div class="log"><ion-icon  class="ico" name="log-out-outline"></ion-icon>   </div>
      <div class="log_out">  <a href="index.php"style='color: white'>  Log Out </a></div>
    </div>

<div class="img">
    <img src="rename1.png" class="rename" style='margin-left: -60px; width: 80.5rem'>
</div>
<div class="pre">
    <div>For Any queries Contact us on Below Number</div>
    <div> All days excluding Bank holiday's, from 8:00 AM to 11:00 PM</div>
</div>

<div class="call">CALL:-022-613062224</div>
<div class="mail">Or Email:- harshverma929001@gmail.com , rahulrajak7080@gmail.com</div>

<div class="footer" style='margin-left: 240px; padding: 1rem 10.77rem 1rem 2rem'>
 <div>   © Copyright Computer Proficiency Certification Test 2021</div>
 <div>   By accessing any information provided in this website, you implicitly agree to terms and conditions.</div>
</div>      
<section class="section">
<form >
    <div class="home">
      <div class="add"style='padding: 1.3rem 1rem 2.3rem 1rem;font-size: 1.3rem; weight: 2rem;  margin-top: 3.65rem; margin-left: 0rem ; margin-right: 7rem; background-color: white; font-size: 1.2rem; font-weight: bold; border-right: 2px solid #28666e; '>  <ion-icon class="icon" name="person-circle-outline" style='color: black'></ion-icon><div class="admin" style='color: black'> ADMIN  HOME </div></div>
      <div class="main"style='background-color: #28666e; margin-top: -1rem;  padding: 2rem 2rem 14.1rem 4rem; margin-left: -1rem;
      margin-right: 7rem; font-size: 1.5rem; margin-bottom: 15rem;'>
      <div class="hom"> <ion-icon name="home-outline"></ion-icon>  
       <a href="shome.php"> HOME</a>
      </div> 
      <div class="student"><ion-icon name="people-outline"></ion-icon>
       <a href="student_stu_info2.php"> Profile</a>
     </div>
     <div class="course"><ion-icon name="book-outline"></ion-icon>
       <a href="student_test.php"> Test </a>
     </div>
     <div class="top"><ion-icon name="ribbon-outline"></ion-icon>
     <a href="student_top_10.php">   Top-10 </a>
     </div>
     <div class="result"><ion-icon name="school-outline"></ion-icon>
       <a href="student_result.php"> Result </a>
     </div>
     <div class="feedback"><ion-icon name="document-text-outline"></ion-icon>
       <a href="student_feedback.php"> Feedback </a>
    </div>
      <div class="contect"><ion-icon name="help-circle-outline"></ion-icon>
      <a href="student_contact.php"> Contact us</a>
    </div>
     </div>
   </div>
</form>
</section>

<div style='margin-left: 79rem; margin-top: -47.2rem; color: white'><?php echo $stu_info['email']; ?></div>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>