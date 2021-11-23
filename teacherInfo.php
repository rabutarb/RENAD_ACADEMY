<?php
session_start();
?>
<?php

$servername = "isproject.org";
$username = "RenadAcademy";
$password = "RahafSaraMahaAlnada";
$dbname = "RENAD_ACADEMY";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$username1 = $_SESSION["username1"];
$password1 = $_SESSION["password1"];
$_SESSION['teacher_username'] = $_GET['userName'];
$_SESSION['teacher_students'] = array();
$sql_get_teacher_students =  "SELECT * FROM STUDENT WHERE TeacherUsername = '$_SESSION[teacher_username]'"; 
$result_get_teacher_students = $conn->query($sql_get_teacher_students);
if ($result_get_teacher_students->num_rows > 0) {
    while ($row = $result_get_teacher_students->fetch_assoc()){
        array_push($_SESSION['teacher_students'], $row['RFID']);
    }
}
?>

<html>
<head>
 <meta charset="UTF-8">
 <title>Teacher Schedule</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container-fluid">
            
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="admin_homepage.php">Home</a>
            </li>
           <li class="nav-item">
              <a class="nav-link" href="gradeslist.php">Grades</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="studentslist.php">Students</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="teacherslist.php">Teachers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Log Out</a>
            </li>
          </ul>
          <a class="navbar-brand" href="admin_homepage.php">
            <img src="renad_logo.png" alt="Avatar Logo" style="width:250px;" class="rounded-pill"> 
          </a>
        </div>
      </nav>
          
</div>
<div align="center">
<br>
<a class="btn-outline-lg" href="creat-Admin.php"> Create a Schedule </a> <br>
</div>

<?php

$sql = "SELECT ID, Schedule_name from SCHEDULE WHERE Created_by = '$_GET[userName]'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
        
          // output data of each row
        // echo "<div class=row>";
        echo "<table style=width:100% id = scheduleTable text-align = center>";
        $c = 0;
        while ($row = $result->fetch_assoc()){
                  $img = 'schedule.png';
              if ($c % 3 == 0){
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td><div class=container mt-3> <div class=card style=width:400px>
         <img class=card-img-top src=".$img." alt=Card image style=width:100%>
         <div class=card-body><h4 class=card-title>".$row['Schedule_name']."</h4><a href=viewschedule.php?id=".$row['ID']; 
         echo " class=btn btn-primary>View Schedule</a>
         <br>
         <a href=edit_schedule_admin.php?id=".$row['ID'];
         echo " class=btn btn-primary>Edit Schedule</a>
         <br>
          <a href=assign_schedule_admin.php?id=".$row['ID'];
         echo " class=btn btn-primary>Assign Schedule</a>
         </div>
        </div></td>";

                  
              } else {echo "<td><div class=container mt-3> <div class=card style=width:400px>
         <img class=card-img-top src=".$img." alt=Card image style=width:100%>
         <div class=card-body><h4 class=card-title>".$row['Schedule_name']."</h4><a href=viewschedule.php?id=".$row['ID']; 
         echo " class=btn btn-primary>View Schedule</a>
         <br>
         <a href=edit_schedule_admin.php?id=".$row['ID'];
         echo " class=btn btn-primary>Edit Schedule</a>
         <br>
         
         <a href=assign_schedule_admin.php?id=".$row['ID'];
         echo " class=btn btn-primary>Assign Schedule</a>
         </div>
         </div>
        </div></td>"; 
              }
               $c++;   
              }
         
        } else {
          echo "No Saved Schedules";
        }
        echo "</table>";
        $conn->close();
      ?>
<br>