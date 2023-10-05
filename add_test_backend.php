<?php 
    
    session_start();
   
// define('query1_error', 'Query is not executed');

const query1_error = 'Query is not executed';

if (!isset($_SESSION['course_id'])) {
    echo "Fatal Error: CourseID is not available";
    exit;
}

// course_id is coming from add_test.php
$cno = $_SESSION['course_id'];

require 'connect.php';

if (!$conn) {
    echo "Not Connected";
    exit;
}

if (isset($_POST['submit'])) {
    
    $qno = $_POST['qno'];
    $q_content = htmlspecialchars($_POST['q_content']);
    $op_a = $_POST['op_a'];
    $op_b = $_POST['op_b'];
    $op_c = $_POST['op_c'];
    $op_d = $_POST['op_d'];

    $op_a_content = htmlspecialchars( $_POST['op_a_content']);
    $op_b_content = htmlspecialchars( $_POST['op_b_content']);
    $op_c_content = htmlspecialchars( $_POST['op_c_content']);
    $op_d_content = htmlspecialchars( $_POST['op_d_content']);
    $answer_op = ($_POST['answer_op']);
    
    if(!isset($_SESSION['test_id'])){
        $test_id = $_POST['test_id'];
        $_SESSION['test_id'] = $test_id;
        
        //running the query from the start.
    $query1 = "INSERT INTO course_test (cno, test_id) VALUES ('$cno', '$test_id')";
    $query2 = "INSERT INTO test (cno, test_id, qno) VALUES ('$cno','$test_id', '$qno')";
    $query3 = "INSERT INTO question (cno, test_id, qno, q_content, answer_op) VALUES ('$cno', '$test_id', '$qno', '$q_content', '$answer_op' )";
    $query4 = "INSERT INTO q_option (cno, test_id, qno, op, op_content) VALUES ('$cno', '$test_id', '$qno', '$op_a', '$op_a_content')";
    $query5 = "INSERT INTO q_option (cno, test_id, qno, op, op_content) VALUES ('$cno', '$test_id', '$qno', '$op_b', '$op_b_content')";
    $query6 = "INSERT INTO q_option (cno, test_id, qno, op, op_content) VALUES ('$cno', '$test_id', '$qno', '$op_c', '$op_c_content')";
    $query7 = "INSERT INTO q_option (cno, test_id, qno, op, op_content) VALUES ('$cno', '$test_id', '$qno', '$op_d', '$op_d_content')";


    //executing the query from the start.
    $data1 = mysqli_query($conn, $query1);
    
    $data2 = mysqli_query($conn, $query2);
    $data3 = mysqli_query($conn, $query3);
    $data4 = mysqli_query($conn, $query4);
    $data5 = mysqli_query($conn, $query5);
    $data6 = mysqli_query($conn, $query6);
    $data7 = mysqli_query($conn, $query7);

    // If everything goes well then enter in the add_test2.php
    header('Location: add_test2.php');
        } else {
    $query2 = "INSERT INTO test (cno, test_id, qno) VALUES ('$cno', '" . $_SESSION['test_id'] . "', '$qno')";
    $query3 = "INSERT INTO question (cno, test_id, qno, q_content, answer_op) VALUES ('$cno', '" . $_SESSION['test_id'] . "', '$qno', '$q_content', '$answer_op' )";
    $query4 = "INSERT INTO q_option (cno, test_id, qno, op, op_content) VALUES ('$cno', '" . $_SESSION['test_id'] . "', '$qno', '$op_a', '$op_a_content')";
    $query5 = "INSERT INTO q_option (cno, test_id, qno, op, op_content) VALUES ('$cno', '" . $_SESSION['test_id'] . "', '$qno', '$op_b', '$op_b_content')";
    $query6 = "INSERT INTO q_option (cno, test_id, qno, op, op_content) VALUES ('$cno', '" . $_SESSION['test_id'] . "', '$qno', '$op_c', '$op_c_content')";
    $query7 = "INSERT INTO q_option (cno, test_id, qno, op, op_content) VALUES ('$cno', '" . $_SESSION['test_id'] . "', '$qno', '$op_d', '$op_d_content')";
     

    // Executing the query from the 2nd query.
    $data2 = mysqli_query($conn, $query2);
    $data3 = mysqli_query($conn, $query3);
    $data4 = mysqli_query($conn, $query4);
    $data5 = mysqli_query($conn, $query5);
    $data6 = mysqli_query($conn, $query6);
    $data7 = mysqli_query($conn, $query7);

    header('Location: add_test2.php');

        }
   

}

    
?>