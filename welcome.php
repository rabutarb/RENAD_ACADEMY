<?php 
session_start();
    $servername = "isproject.org";
    $username = "RenadAcademy";
    $password = "RahafSaraMahaAlnada";
    $dbname = "RENAD_ACADEMY";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    //Check if it is a teacher: 
    
    $sql_find_teacher = "SELECT * FROM TEACHER WHERE TeacherUsername = '$_POST[userName]'";
    
    $sql_find_admin = "SELECT * FROM ADMIN WHERE AdminUsername = '$_POST[userName]'";
    
    $result_find_teacher = $conn->query($sql_find_teacher);
    $result_find_admin = $conn->query($sql_find_admin);
    
    // echo $sql_find_teacher;
    // echo '<br>'; 
    // echo $sql_find_admin;
    // echo '<br>'; 
    // echo 'number of teachers = '.$result_find_teacher->num_rows;
    // echo '<br>'; 
    // echo 'number of admins = '.$result_find_admin->num_rows;
    // echo '<br>'; 
    // // if($result_find_teacher->num_rows > $result_find_admin->num_rows){
    //     echo 'true';
    // } else {
    //     echo 'false';
    // }

    if ($result_find_teacher->num_rows > $result_find_admin->num_rows){
        while($row = $result_find_teacher->fetch_assoc()){
            echo 'finding the teacher'; 
            if ($_POST['userName'] == $row['TeacherUsername'] &&
                $_POST['pwd'] == $row['Password']){
                    $_SESSION["username1"] = $_POST["userName"];
                    $_SESSION["password1"] = $_POST["pwd"];
                    header("Location: teacher_homepage.php"); 
                } else {
                  header("Location: login.php");
                }
        }
    } else {
        while($row = $result_find_admin->fetch_assoc()){
            echo 'finding the admin';
            if ($_POST['userName'] == $row['AdminUsername'] &&
                $_POST['pwd'] == $row['Password']){
                    $_SESSION["username1"] = $_POST["userName"];
                    $_SESSION["password1"] = $_POST["pwd"];
                    header("Location: admin_homepage.php"); 
                } else {
                  header("Location: login.php");
                }
        }    
    }
    
    
    
?>    