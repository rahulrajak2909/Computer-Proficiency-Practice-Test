<?php 
    session_start();

    require 'connect.php';

    //getting the selected result.
    $stu_email = $_SESSION['stu_email'];
 
    $cno = $_GET['cno'];
    $test_id = $_GET['test_id'];
    $time_stamp = $_GET['time_stamp'];

    // fetching the questions 

    $query_ques = "SELECT qno,  q_content from question where cno = '$cno' and test_id = '$test_id' ";
    $query_q = mysqli_query($conn, $query_ques);
    $questions = mysqli_fetch_all($query_q, MYSQLI_ASSOC);





    
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="vieport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
       <link rel="stylesheet" href="student_result.css">

       <style>
      body{
     background: linear-gradient(to bottom left, #79c2d0 , white);
     background-attachment: fixed;
       
      }
    </style>    
</head>
<body> 
<div class="div" style='margin-left: -0.5rem;position: fixed; background-color: #28666e; border-bottom: white; padding: 0rem 1rem 0.5rem 0rem; margin-top: -5.45rem  '>
       <div class="name" style='color: white; margin-left: 2rem; '><ion-icon name="logo-buffer" style='color: white'></ion-icon> Computer Proficiency Practice Test </div>
        <div class="log"><ion-icon  class="ico" name="log-out-outline" style='color: white'></ion-icon>   </div>
      <div class="log_out">  <a href="index.php" style='color: white'> Log Out </a></div>
    </div>

 <section class="section">
<form action="admin_course.php">
    <div class="home">
      <div class="add" style='padding: 1.3rem 1rem 2.3rem 1rem;font-size: 1.3rem; weight: 2rem;  margin-top: 3.65rem; margin-left: 0rem ; margin-right: 7rem; background-color: white; font-size: 1.2rem; font-weight: bold; border-right: 2px solid #28666e; '>  <ion-icon class="icon" name="person-circle-outline" style='color: black'></ion-icon><div class="admin" style='color: black'> STUDENT HOME </div></div>
      <div class="main" style='background-color: #28666e; margin-top: -1rem;  padding: 2rem 2rem 14.1rem 4rem; margin-left: -1rem;
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
  <a href="student_top_10.php"> Top-10 </a>
  </div>
  <div class="result"><ion-icon name="school-outline"></ion-icon>
    <a href="student_result.php" > Result </a>
  </div>
  <div class="feedback"><ion-icon name="document-text-outline"></ion-icon>
    <a href="student_feedback.php" > Feedback </a>
 </div>
   <div class="contect"><ion-icon name="help-circle-outline"></ion-icon>
   <a href="student_contact.php"> Contact us</a>
 </div>
  </div>
</div>
</form>
</section> 



<div style="margin-top: 5rem;  margin-left: 20rem;">
    <?php 
                
     foreach($questions as $que) { 
                 echo "<div style='margin-left: 2rem; margin-right: 2rem; margin-top: 1rem'>"."Q. ".$que['qno']. ":- ". $que['q_content']."<br>"."<br>"."</div>"; 
                 $query_option = "SELECT op, op_content FROM q_option where cno = '$cno' and test_id = '$test_id' and qno = '".$que['qno']."' ";
                 $query_op = mysqli_query($conn, $query_option);
                 $op = mysqli_fetch_all($query_op, MYSQLI_ASSOC);
                 ?>

                    
                 <?php foreach($op as $ops) { ?>
                    <div style='margin-left: 2rem'>
                    <input type="radio"  name = "selected_option[<?php echo $que['qno']; ?>]" value = "<?php echo $ops['op'];?>" disabled >
                     (<?php echo $ops['op'] ?>). <?php echo $ops['op_content'] ?></div>
              
                     <br> 

                    <?php } ?>
                    <br><br>
      <div style="margin-left: 2rem">
            <?php
                // Retrieving the selected option for particular qno.
            $q_for_selected_op = "SELECT selected_op from student_test where cno = '$cno' and test_id = '$test_id' and time_stamp = '$time_stamp' and email = '$stu_email' and qno = '".$que['qno']."' ";

            $q_select_op = mysqli_query($conn, $q_for_selected_op);

            $selected_op = mysqli_fetch_assoc($q_select_op);
            echo "Selected Option is:- ".$selected_op['selected_op'];
         ?> 
    </div>
         <br> 
            
              <?php
                // retrieving the correct option for particular qno.

             $q_correct_op =  "SELECT answer_op FROM question where cno = '$cno' and test_id = '$test_id' and qno = '".$que['qno']."' ";
             $q_co_o = mysqli_query($conn, $q_correct_op);
             $correct_op = mysqli_fetch_assoc($q_co_o);
              echo "<div style='margin-left: 2rem'>" ."Correct Option is :- ".$correct_op['answer_op']."</div>";
             ?>      

                    <br> <br> 
               <?php  } ?> 
               </div>   




                       




</div>
</body>
 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> 
</html>









