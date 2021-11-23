<?php
session_start();

if (!isset($_SESSION['username1'])){
    header("Location: login.php");
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
              <a class="nav-link" href="admin_homepage.php">Home</a>
            </li>
           <li class="nav-item">
              <a class="nav-link" href="gradeslist.php">Grades</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="studentslist.php">Students</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="teacherslist.php">Teachers</a>
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


  
   <div class="container mt-5">
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4" align="center">
        <p> Enter the new Grade details</p>
      <form align="center" method="post" action="add_grade_database.php">
  <div class="form-group">
    <label for="grade">Grade</label>
    <input type="number" class="form-control" name="grade" id="studentrfid" placeholder="Enter Grade Number" required>
  </div>
  <div class="form-group">
    <label for="section">Section</label>
    <input type="text" class="form-control" name = "section" id="studentfname" placeholder="Enter Section" required>
  </div>
  <div class="form-group">
    <label for="section">Teacher</label>
    <input type="text" class="form-control" name = "teacher" id="studentfname" placeholder="Enter Section" required>
  </div>
    <div class="form-group">
    <label for="numberstudents">No. of Students</label>
    <input type="text" class="form-control" name="numberstudents" id="numberstudents" placeholder="Enter No. of Students" required>
    </div>
    <div class="form-group">
    <label for="gradehead">Head of Grade</label>
    <input type="text" class="form-control" name="gradehead" id="gradehead" placeholder="Enter Head of Grade" required>
    </div>
 
<br>
  <button type="submit" class="btn-outline-lg">Create Grade</button>
</form>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
</div>   
      


</body>