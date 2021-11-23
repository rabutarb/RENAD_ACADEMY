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

$_SESSION["studentRFID"] = $_GET['RFID'];
// $teacherUserName = $_GET['TeacherUserName'];

$sql = "SELECT * FROM STUDENT WHERE RFID = '$_SESSION[studentRFID]'";

$resultIssql = $conn->query($sql);

if ($resultIssql->num_rows > 0){
    while($row = $resultIssql->fetch_assoc()){
        $fname = $row["First_Name"];
        $lname = $row["Last_name"];
        $sadmin = $row["AdminUsername"];
        $sgrade = $row["GradeLevel"];
        $sscetion = $row["GradeSection"];
    }    
}    
?>

<html>
<head>
 <meta charset="UTF-8">
 <title>
        <?php echo $fname. ' ' . $lname ?>
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
              <a class="nav-link active" href="teacherstudent.php">My Students</a>
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

</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-sm-1">
    </div>
    <div class="col-sm-10" align="center">

      <h3><?php echo $fname . " " . $lname?></h3>
    <br>
        <?php
            echo "<table style=width:100% id = myTable text-align = center table class='table table-hover'>
        <tr>
            <th>Grade</th> 
            <th>Section</th>
            <th>Admin</th>
        </tr>";
                echo "<tr>";
                    echo "<td>";
                    echo $sgrade;
                    echo "</td>";
                    echo "<td>";
                    echo $sscetion;
                    echo "</td>";
                    echo "<td>";
                    echo $sadmin;
                    echo "</td>";
                    echo "<a class='btn-outline-lg' href='student_schedule.php?RFID=$_SESSION[studentRFID]'>View Schedule</a>";
                    
        ?>
                
        </tr>
    </table>
<br>
            <br>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
</div>


    </body>
    <footer>

        </footer>
</html>


