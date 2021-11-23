<?php
session_start();
header("Location: studentsinfo-admin.php?RFID=$_SESSION[studentRFID]");  
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
    
    
    $sql_insert = "UPDATE STUDENT 
                    SET First_Name = '$_POST[studentfname]',
                        Last_name = '$_POST[studentlname]',
                        AdminUsername = '$_POST[adminusername]',
                        TeacherUsername = '$_POST[teacherusername]',
                        GradeLevel = $_POST[gradelevel],
                        GradeSection = '$_POST[gradesection]'
                    WHERE RFID = $_SESSION[studentRFID]";    
            
    echo $sql_insert; 
    $result = $conn->query($sql_insert);
    echo $result;
?>