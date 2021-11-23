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
if (!isset($_SESSION['username1'])){
    header("Location: login.php"); 
}
?>
<html>
<head>
 <title>Edit Schedule</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
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
      <h1 align="center">
          Edit Schedule
      </h1>


<?PHP
$_SESSION['Schedule_id'] = $_GET[id];
$sql_get_info = "SELECT * FROM SCHEDULE WHERE ID = $_GET[id]";
$result_get_info = $conn->query($sql_get_info);
$classes = array();
$classDuration = array();
$classes_name = array();
if ($result_get_info->num_rows > 0) {
    while($row = $result_get_info->fetch_assoc()){
        $name = $row['Schedule_name'];
        $show = $row['$show'];
        $start_time = $row['start_time'];
        $end_time = $row['end_time'];
        for ($i = 1; $i < 11; $i++){
            $current = 'class'.$i;
            $duration = 'class'.$i.'_duration';
            array_push($classes,$row[$current]);
            array_push($classDuration,$row[$duration]);
            $name = $row[$current];
            $sql_get_name = "SELECT image_subtext FROM IMAGES WHERE ID = '$name'";
            
            $result_get_name = $conn->query($sql_get_name);
            if ($result_get_name->num_rows > 0) {
                while($row2 = $result_get_name->fetch_assoc()){
                   array_push($classes_name,$row2['image_subtext']); 
                }
            }
            // echo $name; 
            
            // print_r($classes_name);
            // echo '<br>';
        }
        // $class1 = $row['class1'];
        // $class2 = $row['class2'];
        // $class3 = $row['class3']; 
        // $class4 = $row['class4'];
        // $class5 = $row['class5'];
        // $class6 = $row['class6'];
        // $class7 = $row['class7'];
        // $class8 = $row['class8'];
        // $class9 = $row['class9'];
        // $class10 = $row['class10'];
        
    }
}

?>
	<!--<div id="content">-->
    <form action="set_update_schedule.php" 
          method="post">
  <div class="form-group">
    <label for="schedule_name">Schedule Name</label>
    <?php 
    echo "<input type='test' class='form-control' name='schedule_name' placeholder='Sunday's schedule' value='".$name."'>";
    ?>
  </div>
  <div class="form-group">
      <br>
      <input type="checkbox" name="show_text" name="show_text" value="Show Text" required>
      <label for="show_text">Show text</label><br>
      <br>
  </div>
  <div class="form-group">
    <label for="start_time">Start time</label>
    <?php
    echo '<input type="time" required class="form-control" name="start_time" value="'.$start_time.'">';
    ?>
    <br>
  </div>
   <div class="form-group">
    <label for="end_time">End time</label>
    <?php 
    echo '<input type="time" required class="form-control" name="end_time" value="'.$end_time.'">';
    ?>
    <br>
  </div>
 <?php 
        $sql_get_teacher_classes = "SELECT Image_id, Subject_name from TEACHER_CLASS_IMAGES WHERE TeacherUsername = '$_SESSION[username1]' AND Hide=0";

        $result_get_teacher_classes = $conn->query($sql_get_teacher_classes);
        
        if ($result_get_teacher_classes->num_rows > 0) {
            $subjects = array();
          while($row = $result_get_teacher_classes->fetch_assoc()) {
              array_push($subjects,$row['Subject_name']);
          }
        }
        
        $i = 1;
        
        // for ($x = 0; $x <= count($subjects); $x++){
        //     $is_set = false;
        //     for($j = 0; $j <= count($classes_name); $j++){
        //         if ($subjects[$x] == $classes_name[$j]){
        //             echo $subjects[$x];
        //             echo "<br>";
        //             echo $classes_name[$j];
        //             $is_set = true;
        //         }
        //     }
        //     echo $is_set;
        // }
        
        while($i < 11){
            echo '
            <div class="dropdown">
            <labe for="class'.$i.'duration"> class'.$i.' duration </lable>
                <input type="number" class="form-control" name="class'.$i.'duration" value="'.$classDuration[$i-1].'">
                <br>
            <label for="class'.$i.'">Class'.$i.'</label>
            <select class="btn btn-secondary dropdown-toggle" type="button" required name="class'.$i.'" data-bs-toggle="dropdown" aria-expanded="false" >
   <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
            for ($x = 0; $x <= count($subjects); $x++){
                $is_set = false;
                for($j = 0; $j <= count($classes_name); $j++){
                    if ($subjects[$x] == $classes_name[$j]){
                        $is_set = true;
                    }
                }
                if ($is_set == true){
                    echo '<option selected="selected">'.$subjects[$x].'</option>';
                }else { echo '<option>'.$subjects[$x].'</option>'; }
             
            }
            $i+=1;
            echo '</ul>
            </select>
        </div>
        <br>';
        }
 ?>
 <br>
  <input type="submit" value="Update Scheduel">
</form>
<!--</div>-->
</body>

<?php

error_reporting(0);
?>
</html>