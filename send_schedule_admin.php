<html>
    
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
    if (!isset($_SESSION['last_id'])){
        $_SESSION['last_id'] = $_GET['id'];
    }
    echo $_SESSION['last_id']; 
    
    $_SESSION['teacher_username'];
    $_SESSION['teacher_students']; //RFID
    $_SESSION['student_name'];  //First_name Last_name

    for ($i = 0; $i < count($_SESSION['teacher_students']); $i++){
        if(isset($_POST[$_SESSION['teacher_students'][$i]])){
            
            $current_rfid = $_SESSION['teacher_students'][$i];
            
            $sql_set_previous_to_inactive = "UPDATE STUDENT_SCHEDULE
            SET active = 0 WHERE Student_RFID = '$current_rfid'";
            mysqli_query($conn, $sql_set_previous_to_inactive);
            
            //if the schedule in the system:
            $sql_find = "SELECT * FROM STUDENT_SCHEDULE WHERE Student_RFID = $current_rfid AND Schedule_id = $_SESSION[last_id]";
            
    
            $result_find = $conn->query($sql_find);
            if ($result_students->num_rows > 0) {
                $sql_insertinto_studentSchedule = "UPDATE STUDENT_SCHEDULE SET active = 1 WHERE Student_RFID = $current_rfid AND Schedule_id = $_SESSION[last_id]";
                
            } else {
                 $sql_insertinto_studentSchedule = "INSERT INTO STUDENT_SCHEDULE(Student_RFID, Schedule_id,  active)  VALUES('$current_rfid', '$_SESSION[last_id]', 1)";
            }
            mysqli_query($conn, $sql_insertinto_studentSchedule);
            header ("Location: viewschedule.php");
        }
    }
    
    // $sql_insertinto_studentSchedule = "INSERT INTO STUDENT_SCHEDULE(Student_RFID, Schedule_id,  active)  VALUES('$_SESSION[studentRFID]', '$_SESSION[last_id]', 1)";
				// $conn->query($sql_insertinto_studentSchedule);
		  //    //  mysqli_query($conn, $sql_insertinto_studentSchedule);
		  //      echo $sql_insertinto_studentSchedule; 
    
?>
</html>