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
    
    if (!isset($_SESSION['username1'])){
    header("Location: login.php"); 
    }
    
    if (!isset($_SESSION['last_id'])){
        $_SESSION['last_id'] = $_GET['id'];
    } 
    echo $_SESSION['last_id']; 
    
    for ($i = 0; $i < count($_SESSION['students']); $i++){
        if(isset($_POST[$_SESSION['students_rfid'][$i]])){
            
            $current_rfid = $_SESSION['students_rfid'][$i];
            
            $sql_set_previous_to_inactive = "UPDATE STUDENT_SCHEDULE
            SET active = 0 WHERE Student_RFID = '$current_rfid'";
            // echo '<br>';
            // echo $sql_set_previous_to_inactive;
            mysqli_query($conn, $sql_set_previous_to_inactive);
            
            //if the schedule in the system:
            $sql_find = "SELECT * FROM STUDENT_SCHEDULE WHERE Student_RFID = $current_rfid AND Schedule_id = $_SESSION[last_id]";
            // echo $sql_find;
            $result_students = $conn->query($sql_find);
            // echo $result_find;
            if ($result_students->num_rows != 0) {
                $sql_insertinto_studentSchedule = "UPDATE STUDENT_SCHEDULE SET active = 1 WHERE Student_RFID = $current_rfid AND Schedule_id = $_SESSION[last_id]"; 
                // echo $sql_insertinto_studentSchedule;
            } else {
                $sql_insertinto_studentSchedule = "INSERT INTO STUDENT_SCHEDULE(Student_RFID, Schedule_id,  active)  VALUES('$current_rfid', '$_SESSION[last_id]', 1)";
                // echo $sql_insertinto_studentSchedule;
            }
            echo $sql_insertinto_studentSchedule;
            mysqli_query($conn, $sql_insertinto_studentSchedule);
            header ("Location: viewschedule.php");
        }
    }
    
    // $sql_insertinto_studentSchedule = "INSERT INTO STUDENT_SCHEDULE(Student_RFID, Schedule_id,  active)  VALUES('$_SESSION[studentRFID]', '$_SESSION[last_id]', 1)";
				// $conn->query($sql_insertinto_studentSchedule);
		  //    //  mysqli_query($conn, $sql_insertinto_studentSchedule);
		  //      echo $sql_insertinto_studentSchedule; 
    
?>