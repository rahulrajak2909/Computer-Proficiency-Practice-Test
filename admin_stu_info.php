


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="vieport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="admin_stu_info.css">
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
<form >
    <div class="home">
      <div class="add" style='padding: 1.3rem 2rem 2.3rem 3.5rem;font-size: 1.2rem; weight: 2rem;  margin-top: 3.65rem; margin-left: -2rem ; margin-right: 7rem; background-color: white; font-size: 1.3rem; font-weight: bold; border-right: 2px solid #28666e;'>  <ion-icon class="icon" name="person-circle-outline" style='color: black'></ion-icon><div class="admin" style='color: black'> ADMIN  HOME </div></div>
      <div class="main" style='background-color: #28666e; margin-top: -1rem;  padding: 2rem 2rem 20rem 4rem; margin-left: -1rem;
    margin-right: 7rem; font-size: 1.5rem; margin-bottom: 15rem;'>
      <div class="hom" > <ion-icon name="home-outline"></ion-icon>  
       <a href="ahome.php"> HOME</a>
      </div> 
      <div class="student"><ion-icon name="people-outline"></ion-icon>
       <a href="admin_stu_info.php" > Student Info.</a>
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
      <a href="admin_contect.html"> Contact us</a>
    </div>
     </div>
   </div>
</form>
</section>   

<div class="information">
  <h1>STUDENT INFORMATION</h1>

<div class="table" >
<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $db = 'cpct';
    

    $conn = mysqli_connect($dbhost, $dbuser, '', $db);

    $query = "SELECT * FROM registration order by SNo ASC";
    $data = mysqli_query($conn, $query);

    $total = mysqli_num_rows($data);

    if ($total != 0) {?>
<div class="stable">
  <table border="1px" align="center" cellpadding="7"  width="700px" style="margin-left: 280px" >
  <tr  > 
    <th name="Sno">S.NO</th>
    <th class="namee" name="fname">Name</th> 
    <th class="date" nane="dob">Date of Birth </th> 
      <th class="gan" name="gender">Gender</th>
      <th class="emaill" name="email">Email</th>
     </tr>
     </div>
     <?php
     $n = 1;
        while ($result = mysqli_fetch_assoc($data)) {
          echo "<tr>
          <td>" . $n . "</td>
          <td>" . $result['fname'] . "</td>
          <td>" . $result['dob'] . "</td>
          <td>" . $result['gender'] . "</td>
          <td>" . $result['email'] . "</td>
          
        </tr>
        ";
        $n++;}
    } else {
      echo "NO record found";
    }
    ?>
  </table>









   

</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>