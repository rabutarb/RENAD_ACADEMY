<?php
session_start();
if (!isset($_SESSION['username1'])){
    header("Location: login.php"); 
}
?>
<html>
<head>
  <title>My Classes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php 
    if (isset($_SESSION['teacher_username'])){
        echo '<nav class="navbar navbar-expand-sm bg-light navbar-light">
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
      </nav>';
    } else {
        echo '<nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container-fluid">
            
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="teacher_homepage.php">Home</a>
            </li>
           <li class="nav-item">
              <a class="nav-link active" href="classeslist.php">My Classes</a>
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
      </nav>';
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

      $sql = "SELECT Image_id from TEACHER_CLASS_IMAGES WHERE TeacherUsername = '$_SESSION[username1]'";
      
      $image_id = array();
      $sql_show_text = "SELECT show_text FROM SCHEDULE WHERE ID = $_GET[id]";
      $result_show_text = $conn->query($sql_show_text);
      $show = 'yes';
      if ($result_show_text->num_rows > 0) {
             while($row = $result_show_text->fetch_assoc()) {
                 if ($row['show_text'] == 0){
                     $show = 'no';
                 }
             }
      }
      for ($i = 1; $i < 11; $i++){
          $_SESSION['current_class'] = 'class'.$i;
          if (!isset($_GET['id'])) {  $sql_get_id = "SELECT class$i FROM SCHEDULE WHERE ID = $_SESSION[last_id]";} else {
              $sql_get_id = "SELECT class$i FROM SCHEDULE WHERE ID = $_GET[id]";
          }
          
          $result_get_id = $conn->query($sql_get_id);
        if ($result_get_id->num_rows > 0) {
             while($row = $result_get_id->fetch_assoc()) {
                 array_push($image_id, $row['class'.$i]);
             }
        }
      }
        echo "<table style=width:100% id = scheduleTable text-align = center>";
        $c = 0;
        if (count($image_id)%3 == 0) {$divide = 3;}
        if (count($image_id)%5 == 0) {$divide = 5;}
        if (count($image_id)%2 == 0) {$divide = 4;}
          for ($i = 0; $i < count($image_id); $i++){
              $current = $image_id[$i];
              $sql_get_image = "SELECT * FROM IMAGES WHERE ID = $current";
               $result_get_image = $conn->query($sql_get_image);
               while($row = $result_get_image->fetch_assoc()) {
                  $img = $row["image_directory"];
                //   $text = $row['image_subtext'];
                if ($show == 'no'){ $text = '';} 
              elseif ($show == 'yes') {$text = $row['image_subtext'];}
              if ($i % $divide == 0){
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>
                  <div class=container mt-3>
                  
                    <div class=card style=width:250px>
                        <img class=card-img-top src=".$img." alt=Card image style=width:100%;height:200px>
                            <div class=card-body><h4 class=card-title>".$text."</h4>
                            </div>
                        </div>
                    </td>";
              } else {
              echo "<td>
                        <div class=container mt-3> 
                            <div class=card style=width:250px>
                                 <img class=card-img-top src=".$img." alt=Card image style=width:100%;height:200px>
                             <div class=card-body>
                                <h4 class=card-title>".$text."</h4>
                            </div>
                        </div>
                    </td>"; 
                }
                  
            }
              $c++;
          }
        echo "</table>";
        $conn->close();
      ?>

      </body>
</html>

     