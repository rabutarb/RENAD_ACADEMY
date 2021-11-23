<?php
    
    $teacher_username = $_POST["teacher_username"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $teacher_password = $_POST["teacher_password"];
    $password_con = $_POST["passwordconfirmation"];
    $department = $_POST["department"];
    $admin = $_POST["adminusername"];
    
    if ($password != $password_con){
        echo "Password does not match!";
        header("Location: add_teacher.php");
    }
    
    $servername = "isproject.org";
    $username = "RenadAcademy";
    $password = "RahafSaraMahaAlnada";
    $dbname = "RENAD_ACADEMY";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "INSERT INTO TEACHER (TeacherUsername, First_name, Last_name, Password, Department, AdminUsername) values ('$teacher_username', '$fname', '$lname', '$teacher_password', '$department', '$admin')";


    if ($conn->query($sql) === TRUE) {
            echo "<h2>New record created successfully</h2>";
            header("Location: teacherslist.php");
        } else {
            echo "Something went wrong! <br>";
            echo "Error: " . $sql . "<br>" . $conn->error;
            // echo $sql;
            // header("Location: add_teacher.php");
        }
    
     
    

?>