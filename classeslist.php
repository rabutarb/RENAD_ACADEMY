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
      </nav>
      <div class="col-sm-4" >
          <p><a href="scheduleupload.php"><button type="button" class="btn-outline-lg">Upload a Class Image</button></a></p>
      </div>
      
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

      $sql = "SELECT * from TEACHER_CLASS_IMAGES WHERE TeacherUsername = '$_SESSION[username1]'";

        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          // output data of each row
        // echo "<div class=row>";
        echo "<table style=width:100% id = scheduleTable text-align = center>";
        $c = 0;
          while($row = $result->fetch_assoc()) {
              
              $sql_get_image = "SELECT * FROM IMAGES WHERE ID = $row[Image_id]";
              $result_get_image = $conn->query($sql_get_image);
              $image_id = $row['Image_id'];
              if ($row['Hide']!=1){
              while($row = $result_get_image->fetch_assoc()) {
                  $img = $row["image_directory"];
              if ($c % 3 == 0){
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td><div class=container mt-3> <div class=card style=width:400px>
         <img class=card-img-top src=".$img." alt=Card image style=width:100%>
         <div class=card-body><h4 class=card-title>".$row['image_subtext']."</h4>
          <a href=".$img; echo " class=btn btn-primary>View Image</a>
         <a href='hide_image.php?id=".$image_id."'"; 
         echo " class=btn btn-primary>Hide Image</a>
         </div>
        </div></td>";

                  
              } else {echo "
              <td><div class=container mt-3> <div class=card style=width:400px>
         <img class=card-img-top src=".$img." alt=Card image style=width:100%>
         <div class=card-body><h4 class=card-title>".$row['image_subtext']."</h4>
         <a href=".$img; echo " class=btn btn-primary>View Image</a>
         <a href='hide_image.php?id=".$image_id."'"; echo " class=btn btn-primary>Hide Image</a>
         </div>
        </div></td>"; 
              }
                  
              }
              $c++;
         
        
        }
          }
        } else {
          echo "No Saved Schedules";
        }
        echo "</table>";
        $conn->close();
      ?>

      </body>
</html>


