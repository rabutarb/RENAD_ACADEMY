<?php
session_start();
if (!isset($_SESSION['username1'])){
    header("Location: login.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
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
    // if (!isset($_SESSION["username1"]) or !isset($_SESSION["password1"])){
    //     $_SESSION["username1"] = $_POST["userName"];
    // $_SESSION["password1"] = $_POST["pwd"];
    // }
    
    
    $sql = "SELECT Password FROM TEACHER WHERE TeacherUsername = '$_SESSION[username1]'";

    $resultIssql = $conn->query($sql);

    if ($resultIssql->num_rows > 0){
        while($row = $resultIssql->fetch_assoc()){
            if ($row["Password"] == $_SESSION["password1"]){
                $sqlTeacherInfo = "SELECT * FROM TEACHER WHERE TeacherUsername = '$_SESSION[username1]'";
                $resultTeacherInfo = $conn->query($sqlTeacherInfo);
                while($row = $resultTeacherInfo->fetch_assoc()){
                    $fname = $row["First_name"];
                    $lname = $row["Last_name"];
                    $dep = $row["Department"];
                    $tadmin = $row["AdminUsername"];
            }
        } else {
            echo "<h3> Incorrect password/username </h3>";
        }
    }    
    
}
?>
          <!-- Header -->
    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-xl-5">
                    <div class="text-container">
                        <h1 class="h1-large"> 
                        <?php echo "Welcome ".$fname. "  ". $lname . "!"?> </h1>
                        <p class="p-large">
                            <?php 
                            echo "Department: ". $dep;
                            echo "<br>";
                            echo "Admin: ". $tadmin;
                            ?>
                        </p>
                        <a class="btn-outline-lg" href="classeslist.php">My Classes</a> <br>
                        <a class="btn-outline-lg" href="teacherstudent.php">My Students</a> <br>
                        <a class="btn-outline-lg" href="scheduleshomepage.php">My Schedules</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-5 col-xl-7">
                    <div class="image-container">
                        <img class="img-fluid" src="Picture1.jpg" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->
</body>
</html>