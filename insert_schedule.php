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
    
$_SESSION['students'];
$_SESSION['students_rfid'];
?>    
<html>
    <head>
        <title>
            Create Schedule
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

        <link rel="stylesheet"
            type="text/css"
            href="scheduleuploadstyle.css" />

    </head>
    <body>
        <?php
             if ($_POST['show_text'] != null){
                 $showtext = 1;
             } else {
                 $showtext = 0;
             }
             $classes = array();
             $classDuration = array();
             $classes_imageID = array();
             for ($x = 1; $x <= 10; $x++){
                $id = "class".$x;
                $duration = 'class'.$x.'duration';
                if($_POST[$id] == ''){
                    array_push($classes,'NULL');
                    array_push($classes_imageID, 'NULL');
                    array_push($classDuration, 'NULL');
                } else {
                    array_push($classes,$_POST[$id]);
                    array_push($classDuration,$_POST[$duration]);
                    $current = $x-1;
                    $sql_get_image_id = "SELECT Image_id FROM TEACHER_CLASS_IMAGES WHERE Subject_name = '$classes[$current]' AND TeacherUsername = '$_SESSION[username1]'";
                    // array_push($classes,$_POST[$id]);
                // echo $sql_get_image_id;
                // echo '<br>';
                $result_get_image_id = $conn->query($sql_get_image_id);
                if ($result_get_image_id->num_rows > 0) {
                    while($row = $result_get_image_id->fetch_assoc()){
                        array_push($classes_imageID, $row['Image_id']);
                    }
                }
            }
                
                // echo '<br>';
            }
            echo '<br>';
            $sql_insert = "INSERT INTO SCHEDULE (Schedule_name,Created_by,show_text,start_time,end_time,class1,class2,class3,class4,class5,class6,class7,class8,class9,class10,class_duration1,class_duration2,class_duration3,class_duration4,class_duration5,class_duration6,class_duration7,class_duration8,class_duration9,class_duration10) VALUES ('$_POST[schedule_name]', '$_SESSION[username1]', $showtext, '$_POST[start_time]', '$_POST[end_time]', $classes_imageID[0], $classes_imageID[1],$classes_imageID[2],$classes_imageID[3],$classes_imageID[4],$classes_imageID[5],$classes_imageID[6],$classes_imageID[7],$classes_imageID[8],$classes_imageID[9],$classDuration[0],$classDuration[1],$classDuration[2],$classDuration[3],$classDuration[4],$classDuration[5],$classDuration[6],$classDuration[7],$classDuration[8],$classDuration[9])";
            // echo $sql_insert;
            if ($conn->query($sql_insert) === TRUE) {
                $_SESSION['last_id'] = $conn->insert_id;
                $last_id = $_SESSION['last_id'];
            echo '<nav class="navbar navbar-expand-sm bg-light navbar-light">
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
          Select Students: 
      </h1>

	<!--<div id="content">-->
    <form action="send_schedule.php" 
          method="post">';
          for ($i = 0; $i < count($_SESSION['students']); $i++){
              echo '<div class="checkbox">
              <label>
              <input type="checkbox" value="'.$_SESSION['students'][$i].'" name="'.$_SESSION['students_rfid'][$i].'">'.$_SESSION['students'][$i].'</label>
            </div>
            <br>
            ';
          }
          echo '<input type="submit" value="Send Scheduel">
                </form>';
            } else {
                header("Location: createschedule.php");
            }
            
            
        ?>
    </body>
</html>