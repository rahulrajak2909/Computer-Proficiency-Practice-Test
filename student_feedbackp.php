<?php
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $db = 'cpct';

        $conn = mysqli_connect($dbhost, $dbuser, '', $db); 

        
if($_POST['submit'])
{
    $fname =$_POST['fname'];
   
    $rating = $_POST['rating'];
    $comment  = $_POST['comment'];
 

        
        
//    $query = " INSERT INTO REGISTRATION VALUES ('$fname' , '$dob', '$email', '$phone', '$pwd', '$cpwd', '$gnd')";
   
$query = "INSERT INTO feedback (fname , email, rating , comment) VALUES ( '$fname' , '$stu_email', '$rating', '$comment')";

$data = mysqli_query($conn , $query);

    if($data)
    {
        
         header('Location: student_feedback.php'); 
    }    
    else{
        echo "not inserted";
    }


}




?>