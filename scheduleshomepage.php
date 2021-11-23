<?php
session_start();
if (!isset($_SESSION['username1'])){
    header("Location: login.php"); 
}
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

// $_SESSION["username1"] = $_POST["userName"];
// $_SESSION["password1"] = $_POST["pwd"];



$sql = "SELECT Password FROM TEACHER WHERE TeacherUsername = '$_SESSION[username1]'";

$resultIssql = $conn->query($sql);

if ($resultIssql->num_rows > 0){
    while($row = $resultIssql->fetch_assoc()){
        if ($row["Password"] == $_SESSION["password1"]){
            $sqlStudents = "SELECT * FROM STUDENT WHERE TeacherUsername = $_SESSION[username1]";
            $result = $conn->query($sqlStudents);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Schedules</title>
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
              <a class="nav-link active" href="teacher_homepage.php">Home</a>
            </li>
           <li class="nav-item">
              <a class="nav-link" href="classeslist.php">My Classes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="teacherstudent.php">My Students</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="scheduleshomepage.php">My Schedules</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Log out</a>
            </li>
          </ul>
          <a class="navbar-brand" href="teacher_homepage.php">
            <img src="renad_logo.png" alt="Avatar Logo" style="width:250px;" class="rounded-pill"> 
          </a>
        </div>
      </nav>

      
  
<div class="container mt-5">
  <div align="center" ; class="row">
    <div class="col-sm-4">
      </div>
    <div class="col-sm-4" >
      <h3>Scheduling System</h3>
      <br>
      <p><a href="createschedule.php"><button type="button" class="btn-outline-lg">Create Schedule</button></p>
      <p><a href="existingschedules.php"><button type="button" class="btn-outline-lg">Existing Schedules</button></p>

</div>
    <div class="col-sm-4">
      </div>
    
</div>

</body>
</html>
