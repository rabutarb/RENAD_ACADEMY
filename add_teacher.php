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
              <a class="nav-link" href="studentslist.php">Students</a>
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

<?php

    $admin_list = array();
    $teacher_list = array();
    
    $servername = "isproject.org";
    $username = "RenadAcademy";
    $password = "RahafSaraMahaAlnada";
    $dbname = "RENAD_ACADEMY";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT AdminUsername FROM ADMIN";
    $sql_teacher = "SELECT TeacherUsername FROM TEACHER";
    
    $resultIssql = $conn->query($sql);
    $result = $conn->query($sql_teacher);
    
    if ($resultIssql->num_rows > 0){
        while($row = $resultIssql->fetch_assoc()){
                array_push($admin_list, $row["AdminUsername"]);
                }
            } else {
            echo "";
        }
    
    if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
            array_push($teacher_list, $row["TeacherUsername"]);
            }
        } else {
        echo "";
    }

?>
  
   <div class="container mt-5">
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4" align="center">
        <p> Enter the new teacher's details</p>
      <form align="center" method="post" action="add_teacher_database.php">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name = "teacher_username" id="username" placeholder="Username" required>
  </div>
  <div class="form-group">
    <label for="fname">First Name</label>
    <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required>
  </div>
    <div class="form-group">
    <label for="lname">Last Name</label>
    <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" required>
  </div>
      <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="teacher_password" id="password" placeholder="Password" required>
  </div>
        <div class="form-group">
    <label for="passwordconfirmation">Confirm Password</label>
    <input type="password" class="form-control" name="passwordconfirmation" id="passwordconfirmation" placeholder="Confirm Password" required>
  </div>
        <div class="form-group">
    <label for="department">Department</label>
    <input type="text" class="form-control" name="department" id="department" placeholder="Department" required>
  </div>
  <div class="form-group">
      <label for="adminusername">Admin</label>
      <select id="adminusername"  name="adminusername" class="form-control" required>
          <option selected> Select </option>
          <?php
          foreach ($admin_list as $admin){
              echo "<option>".$admin."</option>";
          }
            ?>
      </select>
    </div>

<br>
  <button type="submit" class="btn-outline-lg">Create Teacher</button>
</form>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
</div>   
      


</body>