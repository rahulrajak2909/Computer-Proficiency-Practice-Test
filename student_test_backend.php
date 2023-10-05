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

<?php 


    require 'connect.php';
    // if(isset($_POST['submit'])){
    $selected_course_id;
    if(!isset( $_SESSION['stu_course_id'])) {
    if (filter_has_var(INPUT_POST, 'stu_selected_course')) {
        $selected_course_id = $_POST['stu_selected_course'];
    } else {
        $_SESSION['No_Course_Error'] = '*No Course is selected !!';
        header("Location: student_test.php");
        exit;
      } 
      
    
      $_SESSION['stu_course_id'] = $selected_course_id;
    }

      // Bringing all tests for specific Course available.
        $query_for_testids = "SELECT test_id FROM course_test where cno = '" .$_SESSION['stu_course_id']. "' ";

        $testid_query = mysqli_query($conn, $query_for_testids);

         $testid = mysqli_fetch_all($testid_query, MYSQLI_ASSOC);


         if(empty($testid)) {
            $_SESSION['no_tests_added'] =  "*No Tests are available in this course !!";
            header('Location: student_test.php');
            exit;
         }

        // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>course</title>
    <link rel="stylesheet" href="student_course.css">

    <style> body{
background: linear-gradient(to bottom left, #79c2d0 , white);
background-attachment: fixed;

}
</style>
</head>
<body>
    
   
  <div class="div" style='margin-left: -1rem; background-color: #28666e; border-bottom: white; padding: 0rem 0rem 0.5rem 0rem  '>
    <div class="name" style='color: white; margin-left: 2rem'><ion-icon name="logo-buffer" style='color: white'></ion-icon> Computer Proficiency Practice Test </div>
  
 
     <div class="log"><ion-icon  class="ico" name="log-out-outline"></ion-icon>   </div>
   <div class="log_out">  <a href="index.php" style='color: white'>  Log Out </a></div>
 </div>
 <section class="section">
<form  >
 <div class="home">
   <div class="add" style='padding: 1.3rem 1rem 2.3rem 1rem;font-size: 1.3rem; weight: 2rem;  margin-top: 3.65rem; margin-left: 0rem ; margin-right: 7rem; background-color: white; font-size: 1.2rem; font-weight: bold; border-right: 2px solid #28666e;'>  <ion-icon class="icon" name="person-circle-outline"></ion-icon><div class="admin"tyle='color: black'> STUDENT HOME</div></div>
   <div class="main" style='background-color: #28666e; margin-top: -1rem;  padding: 2rem 2rem 14.1rem 4rem; margin-left: -1rem;
   margin-right: 7rem; font-size: 1.5rem; margin-bottom: 15rem;'>
   <div class="hom"> <ion-icon name="home-outline"></ion-icon>  
    <a href="shome.php"> HOME</a>
   </div> 
   <div class="student"><ion-icon name="people-outline"></ion-icon>
    <a href="student_stu_info2.php"> Profile</a>
  </div>
  <div class="course"><ion-icon name="book-outline"></ion-icon>
    <a href="student_test.php"> Test</a>
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

<div style='margin-left: 79rem; margin-top: -2.3rem; color: white'><?php echo $stu_info['email']; ?></div>

<form action="student_test_ques.php" method = "POST">
  <fieldset style='margin-left: 43rem; margin-right: 35rem; margin-top: 2rem'>
<legend>Select a test</legend>

<?php
foreach($testid as $id) {  ?>

    <div>
      <input type="radio" id="course_<?php echo $id['test_id']; ?> " name="selected_test" value="<?php echo $id['test_id']; ?>">
    <?php echo "Test". "-".$id['test_id']; ?>
  </div>
<?php }
 ?>
 <br>
 
<div style='margin-left: 4.4rem'> <a href="student_test_ques.php">
  <input type="submit" value='Start Test' name = "begin_test" style='font-size: 1rem; border-radius: 0.3rem; padding: 0.15rem 1rem 0.15rem 1rem; background-color: darkgreen; color: white; cursor: pointer'> </a>
 </div>
 </fieldset>
 
</form>

 <?php 
     if(isset($_SESSION['no_test_selected'])){
      echo "<div style='margin-left: 65rem; margin-top: -3rem; color: red'>".$_SESSION['no_test_selected']."</div>";
      unset($_SESSION['no_test_selected']);
    }

    if(isset($_SESSION['no_ques_error'])){
      echo $_SESSION['no_ques_error'];
      unset($_SESSION['no_ques_error']);
    };

    

    
 
 ?>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>