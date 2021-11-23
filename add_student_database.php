<?php
    
    $rfid = $_POST["studentrfid"];
    $fname = $_POST["studentfname"];
    $lname = $_POST["studentlname"];
    $admin = $_POST["adminusername"];
    $teacher = $_POST["teacherusername"];
    $grade = $_POST["gradelevel"];
    $section = $_POST["gradesection"];
    
    // echo $rfid . $fname . $lname . $admin . $teacher . $grade . $section;
    
    $servername = "isproject.org";
    $username = "RenadAcademy";
    $password = "RahafSaraMahaAlnada";
    $dbname = "RENAD_ACADEMY";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "INSERT INTO STUDENT (RFID, First_Name, Last_name, AdminUsername, TeacherUsername, GradeLevel, GradeSection) values ($rfid, '$fname', '$lname', '$admin', '$teacher', $grade, '$section')";

    // $resultIssql = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
            echo "<h2>New record created successfully</h2>";
            header("Location: studentslist.php");
        } else {
            echo "Something went wrong!";
            header("Location: add_student.php");
        }
    
     
    

?>