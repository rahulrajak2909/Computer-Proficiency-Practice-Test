<?php

session_start();
require 'connect.php';

    //  $selected_course_id;
    // if (filter_has_var(INPUT_POST, 'selected_course')) {
    //     $selected_course_id = $_POST['selected_course'];
    // } else {
    //     $_SESSION['error'] = 'No Course is selected';
    //     header("Location: admin_course.php");
    //     exit;
    //   } 
    
    //   $_SESSION['course_id'] = $selected_course_id;
    
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="vieport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="add_test.css">
    <style>
      body{
     background: linear-gradient(to bottom left, #79c2d0 , white);
     background-attachment: fixed;
       
      }
    </style>
</head>
<body> 
  <div class="div" style='margin-left: -1rem; background-color: #28666e; border-bottom: white; padding: 0rem 0rem 0.5rem 0rem'>
       <div class="name" style='color: white; margin-left: 2rem'><ion-icon name="logo-buffer"></ion-icon> Computer Proficiency Practice Test </div>
        <div class="log"><ion-icon  class="ico" name="log-out-outline"style='color: white'></ion-icon>   </div>
      <div class="log_out">  <a href="index.php"style='color: white'> Log Out </a></div>
    </div>

<section class="section">
<form >
    <div class="home">
      <div class="add"style='padding: 1.3rem 2rem 2.3rem 3.5rem;font-size: 1.2rem;  margin-top: 3.65rem; margin-left: -2rem ; margin-right: 7rem; background-color: white; font-size: 1.3rem; font-weight: bold; border-right: 2px solid #28666e; '>  <ion-icon class="icon" style='color: black'name="person-circle-outline"></ion-icon><div class="admin"style='color: black'> ADMIN  HOME </div></div>
      <div class="main"style='background-color: #28666e; margin-top: -1rem;  padding: 2rem 2rem 20rem 4rem; margin-left: -1rem;
      margin-right: 7rem; font-size: 1.5rem; margin-bottom: 15rem;'>
      <div class="hom"> <ion-icon name="home-outline"></ion-icon>  
       <a href="ahome.php"> HOME</a>
      </div> 
      <div class="student"><ion-icon name="people-outline"></ion-icon>
       <a href="admin_stu_info.php"> Student Info.</a>
     </div>
     <div class="course"><ion-icon name="book-outline"></ion-icon>
       <a href="admin_course.php"> Courses </a>
     </div>
     <div class="top"><ion-icon name="ribbon-outline"></ion-icon>
     <a href="admin_top.php">   Top-10 </a>
     </div>
   
     <div class="feedback"><ion-icon name="document-text-outline"></ion-icon>
       <a href="admin_feedback.php"> Feedback </a>
    </div>
      <div class="contect"><ion-icon name="help-circle-outline"></ion-icon>
      <a href="admin_contect.html"> Contect us</a>
    </div>
     </div>
   </div>
</form>
</section>   
<form action="add_test_backend.php" method = "POST">
<div style='margin-left: 48rem; text-decoration: underline'>    
  <h1 >Test And Questions</h1>
</div>
<div style='margin-left: 54rem'>
<h2 style='text-decoration: underline'> <?php echo $_SESSION['cname']; ?></h2>
  <h2 style='margin-left: -1.5rem; text-decoration: underline'>Total Test ID -<?php echo $_SESSION['test_id']; ?></h2>
</div>
  

<div style='margin-top: rem;margin-right: -8px; border: 2px solid; padding: 1rem 1.8rem 2rem 0rem'>
    <div class="q_no" style='margin-top: 10px'>
        Q. <input type="text" placeholder="Q.no" class="no" name ="qno">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" placeholder="Question content" class="content" name ="q_content" required>
        </div>
       <div class="option" required>
       <input type="text" placeholder="a" style='width: 22px' value="a" name = "op_a"> &nbsp;&nbsp; <input type="text" class="a" placeholder="options 1" name ="op_a_content">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="text"  placeholder="b" style='width: 22px' value="b" name = "op_b"> &nbsp;&nbsp; <input type="text" class="b" placeholder="options 2" name = "op_b_content" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="text"  placeholder="c" style='width: 22px'value="c" name ="op_c"> &nbsp;&nbsp; 
       <input type="text" class="c"  placeholder="options 3" name ="op_c_content">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="text" placeholder="d" style='width: 22px'value="d" name ="op_d"> &nbsp;&nbsp; <input type="text" class="d" placeholder="options 4" name = "op_d_content" >
    </div>
    <div class="answers">
     Answer: &nbsp;&nbsp;&nbsp;  <input type="text" placeholder="Answer" class="answer" name ="answer_op" required>
    </div>

    <input type="submit" class="smt" name ="submit">
    <?php 
          // if (isset($_SESSION['query1'])) {
          //     $query_error1 = $_SESSION['query1'];
          //     unset($_SESSION['query1']);
          //     echo $query_error1;

          // } 
          
    ?>


</form>
<form action="add_test.php" method = "post"> 
  <a href="add_test.php"> <input type="submit" class="smt" value ="Select Another Test ID" name ="submit_for_testid_change"> </a> 
</form>

<div>

          <!-- query to fetch the qno for particular testid and course_number -->
 <?php 
  $query_for_qno = "SELECT count(*) as count FROM test WHERE cno = ' " .$_SESSION['course_id']. " ' AND test_id  = ' " .$_SESSION['test_id']. " '";
  $qno = mysqli_query($conn, $query_for_qno);
  $total_no_of_qno = mysqli_fetch_assoc($qno);
  ?>
<div style='margin-left: 25rem'>
  Total Question added:- <?php echo $total_no_of_qno['count']; ?></div>
</div></div>
</div></div>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
</body>
</html>




