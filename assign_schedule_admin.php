<?php
session_start();
?>
<?php

if (!isset($_SESSION['username1'])){
    header("Location: login.php");
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


$username1 = $_SESSION["username1"];
$password1 = $_SESSION["password1"];

if (!isset($_SESSION['student_name']) && !isset($_SESSION['teacher_students'])){
    $sqlStudents = "SELECT * FROM STUDENT WHERE TeacherUsername = '$_SESSION[teacher_username]'";
    $result_students = $conn->query($sqlStudents);
    $students=array();
    $stuent_rfid = array();
    if ($result_students->num_rows > 0) {
        while($row = $result_students->fetch_assoc()){
            $studet_name = $row["First_Name"]." ".$row["Last_name"];
            array_push($students, $studet_name);
            array_push($stuent_rfid, $row["RFID"]);
        }
        
    }
    $_SESSION['student_name'] = $students;
    $_SESSION['teacher_students'] = $stuent_rfid;
}



// $_SESSION['teacher_username'];
// $_SESSION['teacher_students']; //RFID
// $_SESSION['student_name'];  //First_name Last_name
$_SESSION['last_id'] = $_GET['id'];
// $sql_get_teacher_students =  "SELECT * FROM STUDENT WHERE TeacherUsername = '$_SESSION[teacher_username]'"; 
// $result_get_teacher_students = $conn->query($sql_get_teacher_students);
// if ($result_get_teacher_students->num_rows > 0) {
//     while ($row = $result_get_teacher_students->fetch_assoc()){
//         array_push($_SESSION['teacher_students'], $row['RFID']);
//     }
// }
?>

<html>
<head>
 <meta charset="UTF-8">
 <title>Assign Schedule</title>
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
      <div class="container mt-5">
  <div class="row">
    <div class="col-sm-1">
    </div>
    <div class="col-sm-10" align="center">
<h1 align="center">
          Select Students: 
      </h1>
      <br>

	<!--<div id="content">-->
    <form action="send_schedule_admin.php" 
          method="post">
          <?php 
          for ($i = 0; $i < count($_SESSION['teacher_students']); $i++){
              $current = $_SESSION['teacher_students'][$i];
              $sql_get_student_info = "SELECT RFID, First_Name, Last_name FROM STUDENT WHERE RFID = $current";
            //   echo $sql_get_student_info;
              $result_get_student_info = $conn->query($sql_get_student_info);
              while ($row = $result_get_student_info->fetch_assoc()) {
                  $name = $row['First_Name']." ".$row['Last_name'];
                //   echo $name;
                //   array_push($_SESSION['student_name'],$name);
                echo '<div class="checkbox">
               <label>
               <input type="checkbox" value="'.$name.'" name="'.$row['RFID'].'">'.$name.'</label>
            </div><br>';
              }
          }
          echo '<br><input type="submit" value="Assign Schedule">
                </form>';
        ?>
    </div>
            <div class="col-sm-4">
    </div>
  </div>
</div>
    </body>
</html>