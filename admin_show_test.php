<?php
  session_start();


  // Logic for Course Change 
    if(isset($_POST['submit_for_course_change'])) {

      unset($_SESSION['course_id']);
      unset($_SESSION['cname']);
    }
    else {

        $selected_course_id;
       if (filter_has_var(INPUT_POST, 'selected_course')) {
           $selected_course_id = $_POST['selected_course'];
       } else {
           $_SESSION['No_Course_Error'] = '*No Course is selected';
           header("Location: admin_course.php");
           exit;
         } 
       
         $_SESSION['course_id'] = $selected_course_id;
       }
   
         //Generating the cname for particular selected cno.
         $query_for_cname = "SELECT cname FROM course_add where cno =  ' " .$_SESSION['course_id']. " '  ";
         $selected_course_name = mysqli_query($conn, $query_for_cname);
   
         if(isset($selected_course_name)) {
   
             $cname = mysqli_fetch_assoc($selected_course_name);
         } else {
   
             echo "Error in retrieving the cname from database";
         }
       
   
         $_SESSION['cname'] = $cname['cname'];
?>
