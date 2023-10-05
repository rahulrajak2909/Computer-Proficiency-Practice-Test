<?php

session_start();
require 'connect.php';
// if user wants to enter the question in another testid of same course then I am allowing it here.
if(isset($_POST['submit_for_testid_change'])){

  unset($_SESSION['test_id']);
} else {


     $selected_course_id;
    if (filter_has_var(INPUT_POST, 'selected_course')) {
        $selected_course_id = $_POST['selected_course'];
    } else {
        $_SESSION['No_Course_Error'] = '*No Course is selected';
        header("Location: admin_course.php");
        exit;
      } 
    
      $_SESSION['course_id'] = $selected_course_id;
       
}

      //Generating the cname for particular selected cno.
      $query_for_cname = "SELECT cname FROM course_add where cno =  '" .$_SESSION['course_id']. "'  ";
      $selected_course_name = mysqli_query($conn, $query_for_cname);

      if(isset($selected_course_name)) {

          $cname = mysqli_fetch_assoc($selected_course_name);
      } else {

          echo "Error in retrieving the cname from database";
      }
    

      $_SESSION['cname'] = $cname['cname'];


      // Generating the total test_id for particular selected course

      $query_for_total_test = "SELECT count(*) as count from course_test where cno = '" .$_SESSION['course_id']. "' ";
      $total_test = mysqli_query($conn, $query_for_total_test);
      $total_testids = mysqli_fetch_assoc($total_test);
      if(empty($total_testids)){

        $testids  = 0;
      } else {

          $testids = $total_testids;
      }
      

      ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      body{
     background: linear-gradient(to bottom left, #79c2d0 , white);
     background-attachment: fixed;
       
      }
    </style>
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
      <div class="add"style='padding: 1.3rem 2rem 2.3rem 3.5rem;font-size: 1.2rem;  margin-top: 3.65rem; margin-left: -2rem ; margin-right: 7rem; background-color: white; font-size: 1.3rem; font-weight: bold; border-right: 2px solid #28666e; '>  <ion-icon class="icon" name="person-circle-outline"></ion-icon><div class="admin" style='color: black'> ADMIN  HOME </div></div>
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
<div class="Questions">
  <h1 style='margin-left: -5rem'>Test and Questions</h1>
  <h2> <?php echo $cname['cname']; ?></h2>
  <h2 style='margin-left: -1.5rem'>Total Test ID :- <?php echo $testids['count']; ?>  </h2>

</div>
<div style='margin-top: 50px; border: 2px solid black; padding: 3rem 1rem 2rem 2rem; margin-right: -8px;'>
<div class="ques">
<div class="test_id" style='margin-left: 25rem; margin-top: -30px; position: fixed'>
  Test ID <input type="text" placeholder="Test id" name ="test_id"  required>
</div>
<div>
    <div class="q_no">
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

</div></div>
</form>

  <!-- Going back to admin_course.php if user wants to add test in another course. -->
<form action="admin_course.php" method = "post"> 
  <a href="admin_course.php"> <input type="submit" class="smt" value ="Select Another Course" name ="submit_for_course_change"> </a> 
</form></div>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
</body>
</html>