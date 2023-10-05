

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="vieport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="ahome.css">

    <style>
      body{
     background: linear-gradient(to bottom left, #79c2d0 , white);
     background-attachment: fixed;
       
      }
    </style>
    
  </head>




<body> 
  <div class="div" style='margin-left: -1rem; background-color: #28666e; border-bottom: white; padding: 0rem 0rem 0.5rem 0rem'>
       <div class="name" style='color: white; margin-left: 2rem'><ion-icon name="logo-buffer" style='color: white'></ion-icon> Computer Proficiency Practice Test </div>
        <div class="log"><ion-icon  class="ico" name="log-out-outline" style='color: white'></ion-icon>   </div>
      <div class="log_out" >  <a href="index.php" style='color: white'>  Log Out </a></div>
    </div>
    
<div>
  <div  style='    margin-left: 300px;
    margin-top: 80px;
    padding: 1rem 2rem 1rem 2.1rem ;
    margin-right: 890px;
    border: 2px solid black;
    padding: 1rem 1rem 0.2rem 5.2rem ;
    border-radius: 12px;
   
    '>
   <a href="admin_stu_info.php" style='text-decoration: none; color: black;'> <img src="proff.png" style='height: 10rem'>
 <h1 style='margin-left: 2rem'>Student</h1>
   <?php
 $dbhost = 'localhost';
 $dbuser = 'root';
 $dbpass = '';
 $db = 'cpct';


 $conn = mysqli_connect($dbhost, $dbuser, '', $db);


    $query = "SELECT Sno from registration ";
    $data = mysqli_query($conn , $query);

  $row =  mysqli_num_rows($data);

  echo '<h1 style="margin-left: 4rem;"> '.$row. '</h1>';
    
   ?></a>
   <h1></h1>
  </div>
  <div  style='   margin-left: 710px;
    margin-top: -325px;
   
    margin-right: 465px;
    border: 2px solid black;
    padding: 1rem 1rem 0.2rem 5.5rem ;
    border-radius: 12px;
   '>
   <a href="admin_course.php" style='text-decoration: none; color: black '> 
   <img src="course.png" style='height: 10rem'>
   <h1 style="margin-left: 1.5rem;">Courses</h1>
    <?php
 $dbhost = 'localhost';
 $dbuser = 'root';
 $dbpass = '';
 $db = 'cpct';


 $conn = mysqli_connect($dbhost, $dbuser, '', $db);


    $query = "SELECT cname from course_add ";
    $data = mysqli_query($conn , $query);

  $row =  mysqli_num_rows($data);

  echo '<h1 style="margin-left: 4rem;"> '.$row. '</h1>';
    
   ?></a>
    <h1></h1>
  </div>
  <div  style='   margin-left: 1135px;
    margin-top: -325px;
    margin-right: 48px;
    border: 2px solid black;
    padding: 0rem 2rem 0rem 5.2rem ;
    border-radius: 12px;
  
'>
<a href="admin_feedback.php" style='text-decoration: none; color: black'> 
  <img src="feed.webp" style='height: 11.2rem'>
   <h1 style="margin-left: 1.3rem;">Feedback</h1>
    <?php
 $dbhost = 'localhost';
 $dbuser = 'root';
 $dbpass = '';
 $db = 'cpct';


 $conn = mysqli_connect($dbhost, $dbuser, '', $db);


    $query = "SELECT fno from feedback ";
    $data = mysqli_query($conn , $query);

  $row =  mysqli_num_rows($data);

  echo '<h1 style="margin-left: 4.4rem;"> '.$row. '</h1>';
    
   ?> </a>
    
  </div>
</div>



<section class="section">
<form class="#" style=''>
    <div class="home">
      <div class="add" style='padding: 1.3rem 2rem 2.3rem 3.5rem;font-size: 1.2rem; weight: 2rem;  margin-top: 3.65rem; margin-left: -2rem ; margin-right: 7rem; background-color: white; font-size: 1.3rem; font-weight: bold; border-right: 2px solid #28666e; '>  <ion-icon style='color: black' class="icon" name="person-circle-outline" ></ion-icon><div class="admin" style='color: black' > ADMIN  HOME </div></div>
<div class="main" style='background-color: #28666e; margin-top: -1rem;  padding: 2rem 2rem 20rem 4rem; margin-left: -1rem;
    margin-right: 7rem; font-size: 1.5rem; margin-bottom: 15rem;'> 
      <div class="hom" > <ion-icon name="home-outline" style='color: white'></ion-icon>  
       <a href="ahome.php"> HOME</a>
      </div> 
      <div class="student" ><ion-icon name="people-outline" style='color: white'></ion-icon>
       <a href="admin_stu_info.php" style='color: white'> Student Info.</a>
     </div>
     <div class="course" ><ion-icon name="book-outline" style='color: white'></ion-icon>
       <a href="admin_course.php" style='color: white'> Courses </a>
     </div>
     <div class="top" ><ion-icon name="ribbon-outline" style='color: white'></ion-icon>
     <a href="admin_top.php" style='color: white'>   Top-10 </a>
     </div>
    
     <div class="feedback" ><ion-icon name="document-text-outline" style='color: white'></ion-icon>
       <a href="admin_feedback.php" style='color: white'> Feedback </a>
    </div>
      <div class="contect" ><ion-icon name="help-circle-outline" style='color: white'></ion-icon>
      <a href="admin_contect.html" style='color: white'> Contact us</a>
    </div>
     </div>
   </div>
</form>
</section> 

</body>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>