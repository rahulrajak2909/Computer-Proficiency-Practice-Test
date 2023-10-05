
<?php
session_start();

 require 'connect.php';

  $stu_email = $_SESSION['stu_email'];

  $query_for_stu_details = "SELECT fname, dob, gender, phone , email FROM registration where email = '$stu_email'";

    $query_stu_info = mysqli_query($conn, $query_for_stu_details);

    $stu_info = mysqli_fetch_assoc($query_stu_info);

    if(empty($stu_info)){
        echo "Student data is not available"; 
    }

?>
<?php 

    if (isset($_SESSION['fname'])) {
        $name_error = $_SESSION['fname'];
        unset($_SESSION['fname']);
      }
    if (isset($_SESSION['email'])){
        $email_error = $_SESSION['email'];
        unset($_SESSION['email']);
    }
    if (isset($_SESSION['phone'])) {
        $phone_error = $_SESSION['phone'];
        unset($_SESSION['phone']);
    }
    if (isset($_SESSION['pass'])) {
        $pass_error = $_SESSION['pass'];
        unset($_SESSION['pass']);
    }

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student info</title>
    <link rel="stylesheet" href="student_stu_info.css">
    <style>
      body{
     background: linear-gradient(to bottom left, #79c2d0 , white);
     background-attachment: fixed;
       
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
<form  action="shome.php">
 <div class="home">
   <div class="add" style='padding: 1.3rem 1rem 2.3rem 1rem;font-size: 1.3rem; weight: 2rem;  margin-top: 3.65rem; margin-left: 0rem ; margin-right: 7rem; background-color: white; font-size: 1.2rem; font-weight: bold; border-right: 2px solid #28666e; '>  <ion-icon class="icon" style='color: black'name="person-circle-outline"></ion-icon><div class="admin"style='color: black'> STUDENT HOME</div></div>
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

<form action="student_stu_info.php" method="post">
<div class="containers" style='margin-left: 600px; margin-top: 70px; margin-right: 300px; font-size: 2rem; padding: 2rem 2rem 2rem 5rem; border: 2px solid; backdrop-filter: blur(15px); border-radius: 15px;  '>
<div style='margin-left: 100px; text-decoration: underline; margin-top: -10px; font-size: 2.5rem;'>  Student Profile</div> <br>
  <div>
    Name :<input type="text" name="fname" value='<?php echo $stu_info['fname'];?>' style='margin-left: 120px; width: 12rem; height: 1.5rem; border-radius: 5px;' required>
  </div>
  <div class = "errors">
                    <small> <?php 
                            if(isset($name_error)){
                                echo "<div style='font-size: 15px; margin-right: 250px; color: red; position: fixed'>".$name_error."</div>"; 
                                    }  ?> 
                    </small>
             </div> 
  <br>
  <div>
  Date of Birth :<input type="date" name="dob"value='<?php echo $stu_info['dob'];?>' style='margin-left: 1.7rem; width: 12rem; height: 1.5rem; border-radius: 5px;' value="." required>
</div><br>
<div>
  Phone number :<input type="text" name="phone" value='<?php echo $stu_info['phone'];?>' style='margin-left: 10px; width: 12rem; height: 1.5rem; border-radius: 5px;'required>
</div>
<div class = "errors">
                    <small> <?php 
                            if(isset($phone_error)){
                                echo "<div style='margin-left: 0px; color: red; font-size: 15px; margin-top: 0px'>".$phone_error. "</div>"; 
                                    }  ?> 
                    </small>
             </div> 
<br>
<div name='gender'  required >
  Gender :
  <input type="radio" name='gender'style='height: 1.5rem; width: 1.2rem' value='<?php echo $stu_info['gender'];?>' required > Male
  <input type="radio" name='gender'style='height: 1.5rem; width: 1.2rem'  value='<?php echo $stu_info['gender'];?>' required> Female
  <input type="radio" name='gender'style='height: 1.5rem; width: 1.2rem' value='<?php echo $stu_info['gender'];?>'required > Other
</div><br>
<div>
  Email :<input type="text" name="email" value='<?php echo $stu_email;?>' style='margin-left: 120px; width: 12rem; height: 1.5rem; border-radius: 5px;' disabled>
</div><br><br>
<div style='margin-left: 170px;'>
  <!-- <button type='submit' style='font-size: 1.5rem; border-radius: 10px; cursor: pointer; background-color: darkgreen; color: white;' name="update ">UPDATE</button> -->
  <input type="submit"  style='font-size: 1.5rem; border-radius: 10px; cursor: pointer; background-color: darkgreen; color: white;' name="update" value="UPDATE">
</div>
</div> 

   
     


</form>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>