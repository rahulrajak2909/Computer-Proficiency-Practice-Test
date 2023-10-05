 <?php 
 session_start();
 date_default_timezone_set('Asia/Kolkata');
 $timestamp = date("Y-m-d H:i:s");
 $_SESSION['time_stamp'] = $timestamp;
 require 'connect.php';

 
    $email =  $_SESSION['stu_email'];
 $cno = $_SESSION['stu_course_id'];
  $testid = $_SESSION['testid'];
 
 if (isset($_POST['submit_test'])) {
    $selectedOptions = $_POST['selected_option'];

    // Loop through the selected options and insert them into the database
    // saving up total_score if selected option matched with correct option.
    $total_score = 0;
    foreach ($selectedOptions as $qno => $selectedOption) {
        
        // fetching the correct option for particular question.
    $q_correct_op =  "SELECT answer_op FROM question where cno = '$cno' and test_id = '$testid' and qno = '$qno' ";
    $q_co_o = mysqli_query($conn, $q_correct_op);
    $correct_op = mysqli_fetch_assoc($q_co_o);

        // checking if selected question is correct or not.
            
        if (strtoupper($correct_op['answer_op']) == strtoupper($selectedOption)) {
                $total_score = $total_score + 1;
        }


        // Insert the selected option into the database using appropriate INSERT statement
        // For example:
$insertQuery = "INSERT INTO student_test (email, cno, test_id, qno, selected_op, time_stamp) VALUES ('$email','$cno', '$testid', '$qno', '$selectedOption' , '$timestamp')";
       $success = mysqli_query($conn, $insertQuery);
    }

       // Inserting the score back into the database
    $query_for_total_score = "INSERT INTO student_top_10 (email, total_score) VALUES ('$email', '$total_score') ON DUPLICATE KEY UPDATE total_score = total_score + '$total_score'";
    $q_total_score = mysqli_query($conn, $query_for_total_score);

        if(isset($success)){
            echo "success";

        } else {
            echo "unsuccess";
        }
    // Additional logic after inserting the selected options

    // Redirect or display a success message
    // header('Location: student_test_backend.php');
    $_SESSION['test_succ'] = "Test is Successfully completed";

    echo $_SESSION['test_succ'];
    
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

// Check if the success message is set and display it
if (isset($_SESSION['test_succ'])) {
    $test_succ = $_SESSION['test_succ'];
    unset($_SESSION['test_succ']); // Clear the session variable
    echo "<script>alert('$test_succ'); window.location.href = 'student_result.php';</script>";
    exit();
}
unset($_SESSION['stu_course_id']);
unset($_SESSION['testid']);


?>