<?php
        require 'connect.php';

        // session_start(); // Start the session

        // // Check if the student is logged in
        // if (isset($_SESSION['email'])) {
        //     $studentId = $_SESSION['email'];
            
        //     // Retrieve student data from the database
        //     $query = "SELECT fname , dob , phone , gender , email from registration where email";
        //     $result = $connection->query($query);
        
        //     if ($result->num_rows > 0) {
        //         $studentData = $result->fetch_assoc();
        
        //         // Populate the update form with the student's data
        //         // ...
        //     } else {
        //         // Handle if student data is not found
        //         // ...
        //     }
        // } else {
        //     // Handle if student is not logged in
        //     // ...
        // }
        
        const Name_Required = '*Please enter your Full Name';
        const Name_Invalid = '*Name should be alphabetic characters only';
        const Phone_Required = '*Phone is not Valid';
        const Phone_Invalid = '*Phone is not within limits.';
    
        require 'error.php';
        session_start();
        // Sanitize and validate Full Name
        
        $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
            $inputs['name'] = $fname;
            if($fname) {
        
                    $fname = trim($fname);
                    if(!preg_match("/^[A-Za-z\s]+$/", $fname)){
                        $_SESSION['fname'] = Name_Invalid;
                        $errors['fname'] = Name_Invalid;
                    }
            } else {
                $_SESSION['fname'] = Name_Required;
                $errors['fname']  = Name_Required;
            }
  

            
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
    $inputs['phone'] = $phone;

if($phone) {

        $phone = filter_var($phone, FILTER_VALIDATE_INT, ['options' => ['min_range' => 6000000000, 'max_range' => 9999999999]]);
        if ($phone === false || $phone === NULL){
                
            $_SESSION['phone'] = Phone_Invalid;
            $errors['phone'] = Phone_Invalid;
        }
} else {
    $_SESSION['phone'] = Phone_Required;
    $errors['phone'] = Phone_Required;
}


if (count($errors) > 0) {
        

  header('Location: student_stu_info2.php');
} else {

  if (isset($_POST['update'])) {
      $fname = $_POST['fname'];
      $dob = $_POST['dob'];
      $phone = $_POST['phone'];
      $gender = $_POST['gender'];
      $stu_email = $_SESSION['stu_email'];
  
  
  
  
      $query = "UPDATE registration SET fname='$fname', dob='$dob', phone='$phone', gender='$gender' WHERE email='$stu_email'";
  
      if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data updated successfully."); window.location.href = "'.$_SERVER['PHP_SELF'].'";</script>';
        exit();
      }
  }
  
}


?>
