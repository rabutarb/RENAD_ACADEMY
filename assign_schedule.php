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
    
if (!isset($_SESSION['students']) && !isset($_SESSION['students_rfid'])){
    $sqlStudents = "SELECT * FROM STUDENT WHERE TeacherUsername = '$_SESSION[username1]'";
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
}

$_SESSION['last_id'] = $_GET['id'];
?>    
<html>
    <head>
        <title>
            Create Schedule
        </title>
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
              <a class="nav-link" href="teacher_homepage.php">Home</a>
            </li>
           <li class="nav-item">
              <a class="nav-link" href="classeslist.php">My Classes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="teacherstudent.php">My Students</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="scheduleshomepage.php">My Schedules</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="login.php">Log out</a>
            </li>
          </ul>
          <a class="navbar-brand" href="teacher_homepage.php">
            <img src="renad_logo.png" alt="Avatar Logo" style="width:250px;" class="rounded-pill"> 
          </a>
        </div>
      </nav>
      <br>
      <br>
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
    <form action="send_schedule.php" 
          method="post">
          <?php 
          for ($i = 0; $i < count($_SESSION['students']); $i++){
               echo '<div class="checkbox">
               <label>
               <input type="checkbox" value="'.$_SESSION['students'][$i].'" name="'.$_SESSION['students_rfid'][$i].'">'.$_SESSION['students'][$i].'</label>
            </div>';
          }
         
        //     <div class="checkbox">
        //       <label><input type="checkbox" value="">Option 2</label>
        //     </div>
        //     <div class="checkbox disabled">
        //       <label><input type="checkbox" value="" disabled>Option 3</label>
        //     </div>
        echo '<br>';
          echo '<input type="submit" value="Send Schedule">
                </form>';
        ?>
        
            </div>
    <div class="col-sm-4">
    </div>
  </div>
</div>
    </body>
</html>
</html>