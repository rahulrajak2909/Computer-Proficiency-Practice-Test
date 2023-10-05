<?php session_start(); 
      unset($_SESSION['stu_course_id']);
      unset($_SESSION['testid']);
?>
<?php


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
   <div class="log_out">  <a href="index.php" style='color: white' >  Log Out </a></div>
 </div>



 <section class="section">
<form  action="shome.php">
 <div class="home">
   <div class="add" style='padding: 1.3rem 1rem 2.3rem 1rem;font-size: 1.3rem; weight: 2rem;  margin-top: 3.65rem; margin-left: 0rem ; margin-right: 7rem; background-color: white; font-size: 1.2rem; font-weight: bold; border-right: 2px solid #28666e;'>  <ion-icon class="icon" name="person-circle-outline"></ion-icon><div class="admin"style='color: black'> STUDENT HOME</div></div>
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

<div>

<form action="student_test_backend.php" method = "POST">

<?php

      require 'connect.php';    

    // $conn = mysqli_connect($dbhost, $dbuser, '', $db);

    $query = "SELECT * FROM course_add ";
    $data = mysqli_query($conn, $query);

    $total = mysqli_num_rows($data);
    if ($total != 0) { ?>
    <div class="php" style="margin-top: -350px; margin-left: 200px" >
      <?php  
          $result = mysqli_fetch_all($data, MYSQLI_ASSOC);?>

    <fieldset class="field" style="margin-left: 480px;
    margin-top: 380px; margin-right: 500px; ">
       
    <legend>Select a Course:</legend>

          
          <?php 
            foreach ($result as $res) { ?> 
          
    
    <div style='padding: 0.5rem 0.5rem 0.5rem 0.5rem; border: 1.5px solid; background-color: '>
      <input type="radio" id="course_<?php echo $res['cname']; ?> " name="stu_selected_course" value="<?php echo $res['cno']; ?>">
      <label for="<?php echo $res['cname']; ?>"><?php echo $res['cname'] ?> </label> 
    </div>


                <!-- // var_dump($res);
                // var_dump($value);
              // var_dump($result);     -->
     <?php   } } ?>
     
     <div style='margin-left: 120px; margin-top: 20px'>  
     <a href="student_test_backend.php"> <input type="submit" value = " Select" name= "submit" style='padding: 0.5rem 1.5rem 0.5rem 1.5rem; border-radius: 8px; background-color: darkgreen; color: white; cursor: pointer'> </a>
</div>

     </fieldset>
  </form>
</div>

<?php 
    if(isset($_SESSION['no_tests_added'])){
      echo "<div style='margin-left: 70rem; margin-top: -5rem; color: red'>" .$_SESSION['no_tests_added']. "</div>";
      unset($_SESSION['no_tests_added']);

    }

    if(isset($_SESSION['No_Course_Error'])) {
      echo "<div style='margin-left: 70rem; margin-top: -5rem; color: red'>".$_SESSION['No_Course_Error']."<div>";
      unset($_SESSION['No_Course_Error']);
    }

?>

</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>