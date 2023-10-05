<?php
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $db = 'cpct';

        $conn = mysqli_connect($dbhost, $dbuser, '', $db); 

const Name_Required = '*Please enter your Full Name';
const Name_Invalid = '*Name should be alphabetic characters only';
const Email_Required = '*Please enter your correct Email';
const Email_Invalid = '*Your email is not correct';
const Phone_Required = '*Phone is not Valid';
const Phone_Invalid = '*Phone is not within limits.';
const Pass_Mismatch = '*Password is not matching';


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


    // Sanitize and Validate email

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $inputs['email'] = $email; 
    if($email) {

        //validate Email
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
         if($email === false) {

                $_SESSION['email'] = Email_Invalid;
                $errors['email'] = Email_Invalid;    
         }

    } else {

            $_SESSION['email'] = Email_Required;
            $errors['email'] = Email_Required;
    }

    //Sanitize and valiate phone 

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

        // validating user to enter same password

            $password1 = $_POST['pass'];
            $confirm_pass = $_POST['cpass'];

        if ($password1 !== $confirm_pass) {

                $_SESSION['pass'] = Pass_Mismatch;
                $errors['pass'] = Pass_Mismatch;
        }


    if (count($errors) > 0) {
        

            header('Location: registration2.php');
    } else {

if($_POST['submit'])
{
    $fname =$_POST['fname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone  = $_POST['phone'];
    $pwd = $_POST['pass'];
    $cpwd = $_POST['cpass'];
    $gnd = $_POST['gender'];

        
        
//    $query = " INSERT INTO REGISTRATION VALUES ('$fname' , '$dob', '$email', '$phone', '$pwd', '$cpwd', '$gnd')";
   
$query = "INSERT INTO REGISTRATION (fname , dob, email , phone , pass , cpass, gender) VALUES ('$fname' , '$dob', '$email', '$phone', '$pwd', '$cpwd', '$gnd')";

$data = mysqli_query($conn , $query);

    if($data)
    {
         header('Location: index.php'); 
    }
    else{
        echo "not inserted";
    }

}
    }



?>