<?php
  session_start();


  // Logic for Course Change 
    if(isset($_POST['submit_for_course_change'])) {

      unset($_SESSION['course_id']);
      unset($_SESSION['cname']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="vieport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
       <link rel="stylesheet" href="admin_course.css">

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
        <div class="log"><ion-icon  class="ico" name="log-out-outline" style='color: white'></ion-icon>   </div>
      <div class="log_out">  <a href="index.php" style='color: white'>  Log Out </a></div>
    </div>

 <section class="section">
<form action="admin_course.php">
    <div class="home">
      <div class="add" style='padding: 1.3rem 2rem 2.3rem 3.5rem;font-size: 1.2rem; weight: 2rem;  margin-top: 3.65rem; margin-left: -2rem ; margin-right: 7rem; background-color: white; font-size: 1.3rem; font-weight: bold; border-right: 2px solid #28666e; '>  <ion-icon class="icon" name="person-circle-outline" style='color: black'></ion-icon><div class="admin" style='color: black'> ADMIN  HOME </div></div>
      <div class="main" style='background-color: #28666e; margin-top: -1rem;  padding: 2rem 2rem 20rem 4rem; margin-left: -1rem;
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

<div class="courses">
  <h1>COURSES</h1>
</div>

<!-- <div>
    <div class="ssc">
        
        SSC CHSL <input type="radio" name="ssc"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        AG-3 <input type="radio" name="ssc">
    </div> -->
    <div class="sub" style="margin-top: -200px"><a href="add_course.html">
      <input type="submit" value="ADD COURSES" class="sub_add" style="margin-left: 550px; margin-top: 250px"></a>
    </div>
</div>

<form action="add_test.php" method = "POST">

<?php

      require 'connect.php';    

    // $conn = mysqli_connect($dbhost, $dbuser, '', $db);

    $query = "SELECT * FROM course_add ";
    $data = mysqli_query($conn, $query);

    $total = mysqli_num_rows($data);
    if ($total != 0) { ?>
    <div class="php" style="margin-top: -350px" >
      <?php  
          $result = mysqli_fetch_all($data, MYSQLI_ASSOC);?>
    
    <fieldset class="field" style="margin-left: 700px;
    margin-top: 265px; margin-right: 400px">
       
    <legend>Select a Course:</legend>

          
          <?php 
            foreach ($result as $res) { ?> 
          
    
    <div>
      <input type="radio" id="course_<?php echo $res['cname']; ?> " name="selected_course" value="<?php echo $res['cno']; ?>">
      <label for="<?php echo $res['cname']; ?>"><?php echo $res['cname'] ?> </label> 
    </div>


                <!-- // var_dump($res);
                // var_dump($value);
              // var_dump($result);     -->
     <?php   } ?>
     
     </fieldset>
  <?php   } else {
      echo "NO record found";
    }
        
    if(isset($_SESSION['No_Course_Error'])){

      echo "<div style='margin-left: 1100px; margin-top: 245px; position: fixed; color: red'>" .$_SESSION['No_Course_Error']. "</div>";
      unset($_SESSION['No_Course_Error']);
    }
        
        
    ?>
       <div>
       <div class="test"><a href="add_test.html">
        <input type="submit" value="ADD TEST" class="add_test" style="padding: 0.2rem 3rem 0.2rem 2.8rem; margin-top: 270px;" name = "submit"></a>
    </div>

</div>

  </form>
</div>



<!-- <form action="#" method='POST' >

<div style='margin-left: 40rem; margin-top: -1.6rem '> <input type="submit" name='show_test' value='SHOW TEST' style='padding: 0.1rem 2.5rem 0.1rem 2.5rem; border-radius: 8px; font-size: 1.1rem; background-color: rgb(19, 114, 32); cursor: pointer;  color: white'></div>

</form>
<?php 

    // if(isset($_POST['show_test'])) {

    //     $query_for_show_test = "SELECT count(*) from course_test where cno =  '" .$_SESSION['show_test_course_id']. "' ";
    //     mysqli_query($conn, $query_for_show_test);
    //     $show_testid = mysqli_fetch_all($query_for_show_test, MYSQLI_ASSOC);
    //     foreach($show_testid as $show) {

    //         echo "Total Test Id are :- ".$show;

    //     }
    // }


?> -->





</body>
 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> 
</html>