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

?>

<html>
<head>
 <meta charset="UTF-8">
 <title><?php echo $_GET['GradeLevel'].$_GET['GradeSection']?></title>
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
      <a class="btn-outline-lg" href="add_teacher.php">Add Teacher</a>
      <br>
    <br>

        <?php
        // $current = $_GET['grade'];
        $sqlStudents = "SELECT * FROM TEACHER ORDER BY TEACHER.First_name ASC";
        $result = $conn->query($sqlStudents);
        if ($result->num_rows > 0) {
            echo "<table style=width:100% id = myTable text-align = center table class='table table-hover'>
        <tr>
            <th>Name</th> 
            <th>Department</th>
            <th>Class</th>
            <th>Head of Grade</th>
            <th> </th>
        </tr>";
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                    echo "<td>";
                    echo '<a href="teacherInfo.php?userName='.$row['TeacherUsername'].'">'.$row['First_name'].' '.$row['Last_name'].'</a>';
                    echo "</td>";
                    
                    echo "<td>";
                    echo $row['Department'];
                    echo "</td>";
                    
                    $sqlFindTeacher = "SELECT GradeLevel, GradeSection FROM TEACHER_GRADE WHERE TeacherUsername = '$row[TeacherUsername]'";
                    
                    $resultFindStudent = $conn->query($sqlFindTeacher);
                    if ($resultFindStudent->num_rows == 0) {
                        echo '<td>--</td>';
                    } else {
                            while($row1 = $resultFindStudent->fetch_assoc()){
                                echo "<td>";
                                echo $row1['GradeLevel'].$row1['GradeSection'];
                                echo "</td>";
                            } 
                    }    
                    
                    $sqlFindTeacherHead = "SELECT Grade_level FROM GRADE_HEAD WHERE Teacher_username = '$row[TeacherUsername]'";
                    $resultFindTeacherHead = $conn->query($sqlFindTeacherHead);
                    if ($resultFindTeacherHead->num_rows == 0) {
                        echo "<td>--</td>";
                    } else {
                        while($row2 = $resultFindTeacherHead->fetch_assoc()){
                            echo '<td>';
                             echo $row2['Grade_level'];
                             echo "</td>";
                        } 
                    }   
                    echo "<td>";
                     echo '<a class="btn-outline-lg" href="edit_teacher_admin.php?userName='.$row['TeacherUsername'].'">'.Edit.'</a>';
                    echo "</td>";
                    
                    
            }    
            $_SESSION["tusername"] = $row['TeacherUsername'];
            echo '<tr>';
        }else{
            echo "0 results";
        }
        ?>
                
        </tr>
    </table>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
</div>


<br>
            <br>
    </body>
    <footer>

        </footer>
    </html>