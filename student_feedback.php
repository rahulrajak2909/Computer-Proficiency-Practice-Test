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

  $stu_email = $_SESSION['stu_email'];

  $query_for_stu_details = "SELECT email,fname FROM registration where email = '$stu_email'";

    $query_stu_info = mysqli_query($conn, $query_for_stu_details);

    $stu_info = mysqli_fetch_assoc($query_stu_info);

    if(empty($stu_info)){
        echo "Student data is not available"; 
    }

// Check if the student has submitted the login form
   

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feedback</title>
    <link rel="stylesheet" href="student_feedback.css">
    <style>
      body{
     /* background: linear-gradient(to bottom left, #79c2d0 , white);
     background-attachment: fixed; */
     background: url(blue2.webp);
background-size: cover;
      }
    </style>
</head>
<body>
    
   
  <div class="div" style='margin-left: -1rem; background-color: #28666e; border-bottom: white; padding: 0rem 0rem 0.5rem 0rem  '>
    <div class="name" style='color: white; margin-left: 2rem'><ion-icon name="logo-buffer"style='color: white'></ion-icon> Computer Proficiency Practice Test </div>
  
 
     <div class="log"><ion-icon  class="ico" name="log-out-outline"></ion-icon>   </div>
   <div class="log_out">  <a href="index.php"style='color: white'>  Log Out </a></div>
 </div>



<section class="section">
<form  action="#">
 <div class="home">
   <div class="add"style='padding: 1.3rem 1rem 2.3rem 1rem;font-size: 1.3rem; weight: 2rem;  margin-top: 3.65rem; margin-left: 0rem ; margin-right: 7rem; background-color: white; font-size: 1.2rem; font-weight: bold; border-right: 2px solid #28666e; '>  <ion-icon class="icon" style='color: black'name="person-circle-outline"></ion-icon><div class="admin"style='color: black'> STUDENT HOME</div></div>
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

<form action="#" method="post">
<div class="container" style=' margin-left: 650px;
        margin-top: 40px;
        border: 1.5px solid;
        padding: 2.5rem 2rem 2rem 4.2rem ;
        margin-right: 350px;
        background: transparent;
        backdrop-filter: blur(0px);
        border-radius: 10px;'>
  <h1 class="fform">Feedback Form</h1>
<div class="cfull">
  
  <div class="fn">Full Name</div> <br>
  <div><input type="text" value='<?php echo $stu_info['fname'];?>' class="finput" name="fname" disabled></div>
</div> <br>
<div class="cemail">
  <div class="em">Email</div> <br>
 <input type="text" placeholder="Email" class="einput" name="email" value='<?php echo $stu_email;?>' disabled>
</div> <br>
<div class="rate" name="rating">
  <div >Rate the course</div><br>
  <div required>
    <input type="radio" name="rating" value="Very Good" required>Very Good
    <input type="radio" name="rating" value="Good"  required>Good
    <input type="radio" name="rating" value="Average"  required>Average
  </div>
</div><br>
<div>
  <div class="please">Please give your Feedback</div><br>
<textarea name="comment"  cols="50" rows="10" placeholder="comments here" ></textarea>
  <div class="your">
<!-- Comments...</div> -->
</div>
<div>
  <a href="student_feedback.html"><input type="submit"  name="submit" style='margin-top: 190px;
    margin-left: 0px;
    font-size: 1.2rem;
    border-radius: 15px;
    cursor: pointer;
    padding: 0.5rem 11rem 0.5rem 10rem; background-color: #28666e; color: white'
  ></a>
</div>
</div>
<?php
        
if(isset($_POST['submit']))
{
    // $fname =$_POST['fname'];
   
    $rating = $_POST['rating'];
    $comment  = $_POST['comment'];
 

        
        
//    $query = " INSERT INTO REGISTRATION VALUES ('$fname' , '$dob', '$email', '$phone', '$pwd', '$cpwd', '$gnd')";
   
$query = "INSERT INTO feedback (fname , email, rating , comment) VALUES ( '$stu_info[fname]' , '$stu_email', '$rating', '$comment')";

$data = mysqli_query($conn , $query);

    if($data)
    {
        
      echo '<script>alert("Feedback Submited successfully."); window.location.href = "'.$_SERVER['PHP_SELF'].'";</script>';
      exit(); 
    }    
    else{
        echo "not inserted";
    }


}




?>
</form>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>