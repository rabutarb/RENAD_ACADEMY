<?php
    
    $grade = $_POST["grade"];
    $section = $_POST["section"];
    $numberstudents = $_POST["numberstudents"];
    $gradehead = $_POST["gradehead"];
    $teacher = $_POST['teacher'];

    
    $servername = "isproject.org";
    $username = "RenadAcademy";
    $password = "RahafSaraMahaAlnada";
    $dbname = "RENAD_ACADEMY";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql_get_head = "SELECT * FROM GRADE_HEAD WHERE Teacher_username='$gradehead' AND  Grade_level=$grade";
    $result_get_head = $conn->query($sql_get_head);
    if ($result_get_head->num_rows <= 0) {
        $Sql_update_grade_head = "INSERT INTO GRADE_HEAD (Grade_level, Teacher_username) values ($grade, '$gradehead')";
        $conn->query($Sql_update_grade_head);
    }
    
    $sql_create_grade = "INSERT INTO GRADE (GradeLevel, GradeSection, Number_of_Students) values ($grade, '$section', $numberstudents)";
    
    $sql_create_teacher_grade = "INSERT INTO TEACHER_GRADE (GradeLevel, GradeSection, TeacherUsername) values ($grade, '$section', '$teacher')";

    

    if ($conn->query($sql_create_grade) === TRUE && 
        $conn->query($sql_create_teacher_grade) === TRUE) {
            echo "<h2>New record created successfully</h2>";
            header("Location: gradeslist.php");
        } else {
            echo "Something went wrong!";
            header("Location: add_grade.php");
        }
    
     
    

?>