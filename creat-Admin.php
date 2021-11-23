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
if (!isset($_SESSION['username1'])){
    header("Location: login.php"); 
}

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
$_SESSION['students'] = $students;
$_SESSION['students_rfid'] = $stuent_rfid;
// print_r($_SESSION['students']);
// echo '<br>';
// print_r($_SESSION['students_rfid']);

?>
<!DOCTYPE html>
<html>
<head>
 <title>Create Schedule</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet"
        type="text/css"
        href="scheduleuploadstyle.css" />

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
      <br>
      <br>
      <h1 align="center">
          Create a New Schedule
      </h1>

	<!--<div id="content">-->
    <form action="insert_schedule_admin.php" 
          method="post">
  <div class="form-group">
    <label for="schedule_name">Schedule Name</label>
    <input type="test" class="form-control" name="schedule_name" placeholder="Sunday's schedule">
  </div>
  <div class="form-group">
      <br>
      <input type="checkbox" name="show_text" name="show_text" value="Show Text">
      <label for="show_text">Show text</label><br>
      <br>
  </div>
  <div class="form-group">
    <label for="start_time">Start time</label>
    <input type="time" class="form-control" name="start_time">
    <br>
  </div>
   <div class="form-group">
    <label for="end_time">End time</label>
    <input type="time" class="form-control" name="end_time">
    <br>
  </div>
 <?php 
        $sql_get_teacher_classes = "SELECT Image_id, Subject_name from TEACHER_CLASS_IMAGES WHERE TeacherUsername = '$_SESSION[teacher_username]' AND Hide=0";
        // echo $sql_get_teacher_classes;
        $result_get_teacher_classes = $conn->query($sql_get_teacher_classes);
        
        if ($result_get_teacher_classes->num_rows > 0) {
            $subjects = array();
          while($row = $result_get_teacher_classes->fetch_assoc()) {
              array_push($subjects,$row['Subject_name']);
          }
        }
        
        $i = 1;
        while($i < 11){
            echo '
            <div class="dropdown">
                <labe for="class'.$i.' duration"> class'.$i.' duration </lable>
                <input type="number" class="form-control" name="class'.$i.'duration">
                <br>
            <div class="dropdown">
            <label for="class'.$i.'">Class'.$i.'</label>
            <select class="btn btn-secondary dropdown-toggle" type="button" name="class'.$i.'" data-bs-toggle="dropdown" aria-expanded="false">
   <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
            for ($x = 0; $x <= count($subjects); $x++){
                if ($subjects[$x] == ""){
                    echo '<option selected="selected">'.$subjects[$x].'</option>';
                    
                }else { echo    '<option>'.$subjects[$x].'</option>'; }
             
            }
            $i+=1;
            echo '</ul>
            </select>
        </div>
        <br>';
        }
 ?>
 <br>
  <input type="submit" class="btn-outline-lg" value="Create Schedule">
</form>
<!--</div>-->
</body>

<?php
error_reporting(0);
?>
</html>