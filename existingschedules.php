<?php
session_start();
?>
<html>
<head>
  <title>Scheduels</title>
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
              <a class="nav-link" href="login.php">Log out</a>
            </li>
          </ul>
          <a class="navbar-brand" href="teacher_homepage.php">
            <img src="renad_logo.png" alt="Avatar Logo" style="width:250px;" class="rounded-pill"> 
          </a>
        </div>
      </nav>
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

      $sql = "SELECT ID, Schedule_name from SCHEDULE WHERE Created_by = '$_SESSION[username1]'";

        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
        
          // output data of each row
        // echo "<div class=row>";
        echo "<table style=width:100% id = scheduleTable text-align = center>";
        $c = 0;
        while ($row = $result->fetch_assoc()){
                  $img = 'schedule.png';
              if ($c % 3 == 0){
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td><div class=container mt-3> <div class=card style=width:400px>
         <img class=card-img-top src=".$img." alt=Card image style=width:100%>
         <div class=card-body><h4 class=card-title>".$row['Schedule_name']."</h4><a href=viewschedule.php?id=".$row['ID']; 
         echo " class=btn btn-primary>View Schedule</a>
         <br>
         <a href=edit_schedule.php?id=".$row['ID'];
         echo " class=btn btn-primary>Edit Schedule</a>
         <br>
         <a href=assign_schedule.php?id=".$row['ID'];
         echo " class=btn btn-primary>Assign Schedule</a>
         </div>
        </div></td>";

                  
              } else {echo "<td><div class=container mt-3> <div class=card style=width:400px>
         <img class=card-img-top src=".$img." alt=Card image style=width:100%>
         <div class=card-body><h4 class=card-title>".$row['Schedule_name']."</h4><a href=viewschedule.php?id=".$row['ID']; 
         echo " class=btn btn-primary>View Schedule</a>
         <br>
         <a href=edit_schedule.php?id=".$row['ID'];
         echo " class=btn btn-primary>Edit Schedule</a> 
         <br>
         <a href=assign_schedule.php?id=".$row['ID'];
         echo " class=btn btn-primary>Assign Schedule</a>
         </div>
        </div></td>"; 
              }
               $c++;   
              }
         
        } else {
          echo "No Saved Schedules";
        }
        echo "</table>";
        $conn->close();
      ?>

      </body>
</html>


