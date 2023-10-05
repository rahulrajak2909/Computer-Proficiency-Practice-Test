<?php 
session_start();
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
    <title>New Registration</title>
    <link rel="stylesheet" href="registration.css">
    <style>
        body{
            background-image: url(phisee.avif);
            background-size: cover:
           
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="cppt">
            <img src="CPPTLOGO.png" alt="">
        </div>
        <div class="head" style='margin-left: 160px'>
            <h1>COMPUTER PROFICIENCY PRACTICE TEST (CPPT)</h1>
            <h2>(Madhav Institute Of Technology & Science)</h2>
        </div>
        <div class="mits" >
            <img src="mits-logo.png" style='margin-left: 120px'>
        </div>
    </div>
    <div class="stu">
        <form action="registration.php" method="POST" class="new"  >
            <fieldset class="student" style='  backdrop-filter: blur(8px); background: transparent;
   border: 1px solid black; box-shadow: 25px 25px 25px #0e506cd4; height: 54vh;
   margin-right: -500px'> <div class="newstudent"> <h2>Student Registration</h2></div>
            <div>
                
          <div>  Full Name: <input type="text" placeholder="Enter your name" class="full" name="fname" required style='height: 1.4rem'> </div>
          
          <div class = "errors">
                    <small> <?php 
                            if(isset($name_error)){
                                echo "<div style='font-size: 15px; margin-right: 530px; color: red; position: fixed'>".$name_error."</div>"; 
                                    }  ?> 
                    </small>
             </div> 
          
           <!-- <div class="class" style='margin-left: 420px; margin-top: -30px; margin-right: 50px'> DOB: <input type="date" class="dob" name="dob" required style='height: 1.4rem; margin-left: 155px; margin-top: -80px; width: 10.4rem'></div> -->
           <div style='margin-left: 23.5rem; margin-top: -1.7rem'> DOB: <input type="date"name='dob' require style='margin-left: 8.5rem; width: 10.5rem; height: 1.5rem'></div>
           <br> 
            
        <div> 
          <div class="emailcom" style='margin-top: 15px'>   Email: <input type="email" placeholder="Enter your email" class="email" name="email" required style='height: 1.4rem'></div>
             <div class = "errors">
                    <small> <?php 
                            if(isset($email_error)){
                                echo "<div style='font-size: 15px; color: red; position: fixed'>".$email_error."</div>"; 
                                    }  ?> 
                    </small>
             </div> 
             <div class="numberr" style=' margin-left: 380px; margin-top: -30px'>  Phone number:<input class="phone" type="text" placeholder="Enter your number"  min="1" max="10" name="phone" required style='margin-left: 55px; height: 1.4rem'></div>

             <div class = "errors">
                    <small> <?php 
                            if(isset($phone_error)){
                                echo "<div style='margin-left: 420px; color: red; font-size: 15px; margin-top: 0px'>".$phone_error. "</div>"; 
                                    }  ?> 
                    </small>
             </div> 

                                    
              </div> <br>
            <div>
           <div style='margin-top: 10px'> Password: <input type="password" placeholder="Enter your password" class="pass" name="pass" required style='height: 1.4rem'>
            Confirm Password:<input type="password" placeholder="Confirm your password" class="cpass" name="cpass" required style='height: 1.4rem; margin-left: 15px'></div>

            <div class = "errors">
                    <small> <?php 
                            if(isset($pass_error)){
                                echo "<div style='font-size: 15px; color: red; position: fixed'>".$pass_error."</div>"; 
                                    }  ?> 
                    </small>
             </div> 

        </div><br>
        <div name="gender" required>
         Gender :
            <input type="radio" name="gender" value="m"> Male
            <input type="radio" name="gender" value="f"> Female
            <input type="radio" name="gender" value="o"> Others
          
        </div><br><br>
         <div class="send">
         <input type="submit" class="send-otp" name="submit"> 
         
         </div>
         </div>
            </fieldset>
        </form>
    </div>  
</body>

</html>





