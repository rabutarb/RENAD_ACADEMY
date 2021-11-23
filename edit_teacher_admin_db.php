<?php
session_start();
header("Location: teacherslist.php?");  
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
    
    echo $_SESSION["tusername"];
    $sql_insert = "UPDATE TEACHER 
                    SET First_name = '$_POST[fname]',
                        Last_name = '$_POST[lname]',
                        Department = '$_POST[department]',
                        AdminUsername = '$_POST[adminusername]'
                    WHERE TeacherUsername = '$_SESSION[tusername]'";    
            
    echo $sql_insert; 
    $result = $conn->query($sql_insert);
    echo $result;
?>