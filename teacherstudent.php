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


$username1 = $_SESSION["username1"];
$password1 = $_SESSION["password1"];

$sql = "SELECT Password FROM TEACHER WHERE TeacherUsername = '$username1'";

$resultIssql = $conn->query($sql);

if ($resultIssql->num_rows > 0){
    while($row = $resultIssql->fetch_assoc()){
        if ($row["Password"] == $password1){
            $sqlStudents = "SELECT * FROM STUDENT WHERE TeacherUsername = '$username1'";
            $result = $conn->query($sqlStudents);
        }
    }
}
?>

<html>
<head>
 <meta charset="UTF-8">
 <title>My Students</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
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

</div>
<br>
<br>
<!--<h2><a href = "new_match.php">Insert New Match</a></h2>-->
<br>
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-1">
    </div>
    <div class="col-sm-10" align="center">

      <h3>My Students</h3>
              <br>
        <br>
        <?php
        $sqlStudents = "SELECT * FROM STUDENT WHERE TeacherUsername = '$username1'";
        $result = $conn->query($sqlStudents);
        if ($result->num_rows > 0) {
            echo "<table style=width:100% id = myTable text-align = center table class='table table-hover'>
        <tr>
            <th>Student Name</th> 
            <th>Student Grade</th>
            <th>Section</th>
        </tr>";
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                    // echo "<td>";
                    // echo $row["RFID"];
                    // echo "</td>";
                    echo "<td>";
                    echo "<a class=btn btn-light href='studentInfo.php?RFID=".$row['RFID']."&TeacherUserName=".$username1."'> ".$row["First_Name"] . " ". $row["Last_name"]."</a>";
                    echo "</td>";
                    echo "<td>";
                    echo $row["GradeLevel"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["GradeSection"];
                    echo "</td>";
            }
        }else{
            echo "0 results";
        }
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