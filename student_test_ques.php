
 <?php 
          require 'connect.php';
            session_start();
            // User selected course_id
             $cno = $_SESSION['stu_course_id'];
        // Kam Pragati par hai............................
          $query_for_cname = "SELECT cname FROM course_add where cno = '$cno'";
          $query_cname = mysqli_query($conn, $query_for_cname);

           

                $cname = mysqli_fetch_assoc($query_cname);
         
                



          
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="vieport" content="width=device-width, initial-scale=1.0">
    <title>student Home</title>
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









<?php 
// session_start();
// // User selected course_id
//  $cno = $_SESSION['stu_course_id'];

        //Checking if user/student selected any testid or not.
        
            if(filter_has_var(INPUT_POST, 'selected_test')){
                $testid = $_POST['selected_test'];
                $_SESSION['testid'] = $testid;
            } else {
                $_SESSION['no_test_selected'] = "*No test is selected!!";
                header('Location: student_test_backend.php');
                exit;
            }
        

    //Fetching all the questions available in this particular test_id
                

                $query_ques = "SELECT qno,  q_content from question where cno = '$cno' and test_id = '$testid' ";
                $query_q = mysqli_query($conn, $query_ques);
                $questions = mysqli_fetch_all($query_q, MYSQLI_ASSOC);

                if(empty($questions)){

                    $_SESSION['no_ques_error'] = "No Questions are added in this test.";
                    header('Location: student_test_backend.php');
                    exit;
                }
                ?>
               <h2 style='margin-left: 50rem; margin-top: 5rem; text-decoration: underline;'> <?php echo $cname['cname']; ?> </h2>
                <br><br><br>
    <div style='margin-top: -2rem'>   
             

<form action = "student_test_ques_backend.php" method = "POST">
                <?php 
                    // $op;

                foreach($questions as $que) { 
                     echo "<div style='margin-left: 22rem'>"."Q. ".$que['qno']. ":- ". $que['q_content']."<br>"."<br>"."</div>"; 
                     $query_option = "SELECT op, op_content FROM q_option where cno = '$cno' and test_id = '$testid' and qno = '".$que['qno']."' ";
                     $query_op = mysqli_query($conn, $query_option);
                     $op = mysqli_fetch_all($query_op, MYSQLI_ASSOC);
                     ?>

                        
                     <?php foreach($op as $ops) { ?>
                        <div style='margin-left: 22rem'>
                        <input type="radio"  name = "selected_option[<?php echo $que['qno']; ?>]" value = "<?php echo $ops['op'];?>" required >
                         (<?php echo $ops['op'] ?>). <?php echo $ops['op_content'] ?></div>
                  
                         <br> 

                        <?php } ?>
                        <br> <br> 
             <?php  } ?>
<div style='margin-left: 54rem; '>
        <input type="submit" name = "submit_test" value ="Submit Test" style='padding: 0.5rem 2rem 0.5rem 2rem; border-radius: 8px; background-color: darkgreen; color: white; cursor: pointer'></div>
        </div>

</form>

<?php 










                       

?>  



</div>
</body>
 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> 
</html>









